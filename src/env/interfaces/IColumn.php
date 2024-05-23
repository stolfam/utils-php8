<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env\Interfaces;

    /**
     * Interface IColumn
     * @package Ataccama\Common\Env
     */
    interface IColumn
    {
        public function getName(): string;

        public function getValue();
    }