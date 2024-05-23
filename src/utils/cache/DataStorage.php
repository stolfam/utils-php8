<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Cache;

    use Nette\Caching\Cache;
    use Nette\Caching\Storages\FileStorage;


    /**
     * Class DataStorage
     * @package Ataccama\Common\Utils\Cache
     */
    class DataStorage
    {
        protected array $objects = [];
        public bool $cache = true;
        protected Cache $cachedStorage;

        /**
         * DataStorage constructor.
         * @param string $persistDir
         * @param bool   $cache
         */
        public function __construct(string $persistDir, bool $cache = true)
        {
            if (!file_exists($persistDir)) {
                mkdir($persistDir);
            }
            $storage = new FileStorage($persistDir);
            $this->cachedStorage = new Cache($storage, "layer.data");
            $this->cache = $cache;
        }

        /**
         * Returns the stored (and cached) object under the $key.
         *
         * @param IKey $key
         * @return mixed|null
         * @throws \Throwable
         */
        public function get(IKey $key): mixed
        {
            $key = self::getKey($key);

            if (isset($this->objects[$key])) {
                return $this->objects[$key];
            }

            if ($this->cache) {
                $o = $this->cachedStorage->load($key);
                if ($o !== null) {
                    return $o;
                }
            }

            if (isset($this->objects[$key])) {
                if ($this->cache) {
                    $this->cachedStorage->save($key, $this->objects[$key], [
                        Cache::EXPIRE  => '2 months',
                        Cache::SLIDING => true
                    ]);
                }

                return $this->objects[$key];
            }

            return null;
        }

        /**
         * Adds object to data storage and cached it.
         *
         * @param IKey   $key
         * @param mixed  $o
         * @param string $expireIn
         * @param bool   $cacheSliding
         * @return mixed
         * @throws \Throwable
         */
        public function add(IKey $key, mixed $o, string $expireIn = '2 months', bool $cacheSliding = true): mixed
        {
            $key = self::getKey($key);

            $this->objects[$key] = $o;
            if ($this->cache) {
                $this->cachedStorage->save($key, $o, [
                    Cache::EXPIRE  => $expireIn,
                    Cache::SLIDING => $cacheSliding
                ]);
            }

            return $o;
        }

        /**
         * Call this function when stored data are changed.
         *
         * @param IKey $key
         * @throws \Throwable
         */
        public function notifyChange(IKey $key): void
        {
            $dependency = $this->getDependency($key);

            if ($this->cache) {
                $this->cachedStorage->remove(self::getKey($key));
            }
            unset($this->objects[self::getKey($key)]);

            if ($dependency != null) {
                foreach ($dependency->listParents() as $parent) {
                    $this->notifyChange($parent->getKey());
                    $this->removeDependency($key, $parent->getKey());
                }
            }
        }

        /**
         * @param IKey $key
         * @return string
         */
        public static function getKey(IKey $key): string
        {
            return (!empty($key->getPrefix()) ? $key->getPrefix() . '_' : '') . $key->getId();
        }

        /**
         * @param IKey $child
         * @return Dependency|null
         * @throws \Throwable
         */
        private function getDependency(IKey $child): ?Dependency
        {
            return $this->get(new Dependency($child));
        }

        /**
         * @param IKey $child
         * @param IKey $parent
         * @throws \Throwable
         */
        public function createDependency(IKey $child, IKey $parent): void
        {
            $dependency = $this->get(new Dependency($child));
            if ($dependency == null) {
                $dependency = new Dependency($child);
            }

            $dependency->addParent(new Dependency($parent));

            $this->add($dependency, $dependency);
        }

        /**
         * @param IKey $child
         * @param IKey $parent
         * @throws \Throwable
         */
        protected function removeDependency(IKey $child, IKey $parent): void
        {
            $dependency = $this->get(new Dependency($child));
            if ($dependency instanceof Dependency) {
                $dependency->removeDependency(new Dependency($parent));

                if ($dependency->count() > 0) {
                    $this->add($dependency, $dependency);
                } else {
                    $this->notifyChange($dependency);
                }
            }
        }
    }