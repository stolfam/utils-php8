<?php

    namespace Ataccama\Common\Env;

    /**
     * Class FloatColumn
     * @package Ataccama\Common\Env
     */
    class FloatColumn extends NullableFloatColumn
    {
        /** @var float */
        public $value;

        /**
         * FloatColumn constructor.
         * @param string $name
         * @param float  $value
         */
        public function __construct(string $name, float $value)
        {
            parent::__construct($name, $value);
        }
    }