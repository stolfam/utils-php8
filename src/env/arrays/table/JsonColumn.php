<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class JsonColumn
     * @package Ataccama\Common\Env
     */
    class JsonColumn extends NullableJsonColumn
    {
        /** @var string */
        public $value;

        /**
         * JsonColumn constructor.
         * @param string $name
         * @param object $value
         */
        public function __construct(string $name, object $value)
        {
            parent::__construct($name, $value);
        }

        public function getValue(): object
        {
            return parent::getValue();
        }
    }