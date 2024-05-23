<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env\Arrays;

    use Ataccama\Common\Env\Interfaces\IStringPair;
    use Ataccama\Common\Env\IPair;
    use Ataccama\Common\Env\PairArray;


    /**
     * Class StringPairArray
     * @package Ataccama\Common\Env\Arrays
     */
    class StringPairArray extends PairArray
    {
        /**
         * StringPairArray constructor.
         * @param IStringPair[] $stringPairs
         */
        public function __construct(array $stringPairs = [])
        {
            parent::__construct();
            foreach ($stringPairs as $pair) {
                if ($pair instanceof IStringPair) {
                    $this->items[$pair->getKey()] = $pair;
                } else {
                    throw new \InvalidArgumentException("An element MUST implement interface IStringPair");
                }
            }
        }

        /**
         * @param string $key
         * @return IStringPair|null
         */
        public function get($key): ?IPair
        {
            if (isset($this->items[$key])) {
                return $this->items[$key];
            }

            return null;
        }

        /**
         * @param StringPairArray $stringPairArray
         * @return StringPairArray
         */
        public function insert($stringPairArray): self
        {
            parent::insert($stringPairArray);

            return $this;
        }

        /**
         * @param IStringPair $pair
         * @return PairArray
         */
        public function add($pair): PairArray
        {
            $this->items[$pair->getKey()] = $pair;

            return $this;
        }

        /**
         * @return IStringPair
         */
        public function current(): IPair
        {
            return current($this->items);
        }

        public function toArray(): array
        {
            $pairs = [];
            foreach ($this as $stringPair) {
                $pairs[$stringPair->getKey()] = $stringPair->getValue();
            }

            return $pairs;
        }
    }