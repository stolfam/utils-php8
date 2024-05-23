<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class BoolColumn
     * @package Ataccama\Common\Env
     */
    class BoolColumn extends NullableBoolColumn
    {
        /** @var bool */
        public $value;

        /**
         * BoolColumn constructor.
         * @param string $name
         * @param bool   $value
         */
        public function __construct(string $name, bool $value)
        {
            parent::__construct($name, $value);
        }

        public function getValue(): bool
        {
            return parent::getValue();
        }
    }