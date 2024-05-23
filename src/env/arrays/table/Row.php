<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    use Ataccama\Common\Env\Interfaces\IColumn;


    /**
     * Class Row
     * @package Ataccama\Common\Env
     */
    class Row implements IArray
    {
        /** @var IColumn[] */
        private $columns;

        /**
         * TableRow constructor.
         * @param IColumn[] $columns
         */
        public function __construct(array $columns = [])
        {
            foreach ($columns as $column) {
                $this->add($column);
            }
        }

        public function add(IColumn $column): Row
        {
            $this->columns[$column->getName()] = $column;

            return $this;
        }

        /**
         * @return mixed[]
         */
        public function toArray(): array
        {
            $array = [];
            foreach ($this->columns as $column) {
                $array[$column->getName()] = $column->getValue();
            }

            return $array;
        }
    }