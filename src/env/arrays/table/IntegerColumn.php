<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    use Ataccama\Common\Env\Arrays\Table\NullableIntegerColumn;


    /**
     * Class IntegerColumn
     * @package Ataccama\Common\Env
     */
    class IntegerColumn extends NullableIntegerColumn
    {
        /** @var int */
        public $value;

        /**
         * IntegerColumn constructor.
         * @param string $name
         * @param int    $value
         */
        public function __construct(string $name, int $value)
        {
            parent::__construct($name, $value);
        }

        public function getValue(): int
        {
            return parent::getValue();
        }
    }