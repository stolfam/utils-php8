<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class NullableJsonColumn
     * @package Ataccama\Common\Env
     */
    class NullableJsonColumn extends Column
    {
        /** @var string|null */
        public $value;

        /**
         * NullableStringColumn constructor.
         * @param string      $name
         * @param object|null $value
         */
        public function __construct(string $name, ?object $value = null)
        {
            parent::__construct($name, $value);
        }

        public function getValue(): ?object
        {
            return parent::getValue();
        }
    }