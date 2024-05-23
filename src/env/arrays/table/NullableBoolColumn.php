<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class NullableBoolColumn
     * @package Ataccama\Common\Env
     */
    class NullableBoolColumn extends Column
    {
        /** @var bool|null */
        public $value;

        /**
         * BoolColumn constructor.
         * @param string $name
         * @param bool   $value
         */
        public function __construct(string $name, ?bool $value = null)
        {
            parent::__construct($name, $value);
        }

        public function getValue(): ?bool
        {
            return parent::getValue();
        }
    }