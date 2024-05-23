<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class NullableStringColumn
     * @package Ataccama\Common\Env
     */
    class NullableStringColumn extends Column
    {
        /** @var string|null */
        public $value;

        /**
         * NullableStringColumn constructor.
         * @param string      $name
         * @param string|null $value
         */
        public function __construct(string $name, ?string $value = null)
        {
            parent::__construct($name, $value);
        }

        public function getValue(): ?string
        {
            return parent::getValue();
        }
    }