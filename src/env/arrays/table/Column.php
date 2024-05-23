<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    use Ataccama\Common\Env\Interfaces\IColumn;


    /**
     * Class Column
     * @package Ataccama\Common\Env
     */
    class Column implements IColumn
    {
        /** @var string */
        public $name;

        /** @var mixed|null */
        public $value;

        /**
         * Column constructor.
         * @param string     $name
         * @param mixed|null $value
         */
        public function __construct(string $name, $value = null)
        {
            $this->name = $name;
            $this->value = $value;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getValue()
        {
            return $this->value;
        }
    }