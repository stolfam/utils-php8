<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class StringColumn
     * @package Ataccama\Common\Env
     */
    class StringColumn extends NullableStringColumn
    {
        /** @var string */
        public $value;

        /**
         * StringColumn constructor.
         * @param string $name
         * @param string $value
         */
        public function __construct(string $name, string $value)
        {
            parent::__construct($name, $value);
        }

        public function getValue(): string
        {
            return parent::getValue();
        }
    }