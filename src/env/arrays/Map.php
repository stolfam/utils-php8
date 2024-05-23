<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class Map
     * @package Ataccama\Common\Env
     */
    class Map extends BaseArray
    {
        /**
         * @param                 $value
         * @param string|int|null $key
         * @param bool            $overwrite
         * @return Map
         */
        public function add($value, string|int $key = null, bool $overwrite = true): self
        {
            if (isset($key)) {
                if ($overwrite) {
                    $this->items[$key] = $value;
                } else {
                    if (!isset($this->items[$key])) {
                        $this->items[$key] = $value;
                    }
                }
            } else {
                parent::add($value);
            }

            return $this;
        }

        /**
         * @param      $map
         * @param bool $overwrite
         * @return Map
         */
        public function insert($map, bool $overwrite = true): self
        {
            foreach ($map as $key => $value) {
                $this->add($value, $key, $overwrite);
            }

            return $this;
        }

        /**
         * @param $key
         * @return mixed
         */
        public function get($key): mixed
        {
            return parent::get($key);
        }
    }