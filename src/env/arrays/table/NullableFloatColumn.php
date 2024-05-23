<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class NullableFloatColumn
     * @package Ataccama\Common\Env
     */
    class NullableFloatColumn extends Column
    {
        /** @var float|null */
        public $value;

        /**
         * NullableFloatColumn constructor.
         * @param string     $name
         * @param float|null $value
         */
        public function __construct(string $name, ?float $value = null)
        {
            parent::__construct($name, $value);
        }

        public function getValue(): ?float
        {
            return parent::getValue();
        }
    }