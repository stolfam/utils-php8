<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Interface IStorable
     * @package Ataccama\Common\Env
     *
     * Provides serialized data in row with column names (represented by array)
     *
     * Example:
     *  [
     *      "column_name" =>            $value,
     *      "another_column_name" =>    $another_value
     *  ]
     */
    interface IStorable
    {
        public function toRow(): Row;
    }