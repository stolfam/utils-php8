<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env\Arrays\Table;

    use Ataccama\Common\Env\Column;


    /**
     * Class IntegerColumn
     * @package Ataccama\Common\Env\Arrays\Table
     */
    class NullableIntegerColumn extends Column
    {
        /** @var int|null */
        public $value;

        /**
         * IntegerColumn constructor.
         * @param string $name
         * @param int    $value
         */
        public function __construct(string $name, ?int $value = null)
        {
            parent::__construct($name, $value);
        }

        public function getValue(): ?int
        {
            return $this->value;
        }
    }