<?php
declare(strict_types=1);
    namespace Ataccama\Common\Env;

    /**
     * Class Pair
     * @package Ataccama\Common\Env
     */
    class Pair implements IPair
    {
        public mixed $key, $value;

        /**
         * Pair constructor.
         * @param mixed $key
         * @param mixed $value
         */
        public function __construct(mixed $key, mixed $value)
        {
            $this->key = $key;
            $this->value = $value;
        }

        public function getKey(): mixed
        {
            return $this->key;
        }

        public function getValue(): mixed
        {
            return $this->value;
        }
    }