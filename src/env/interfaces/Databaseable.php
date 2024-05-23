<?php

    namespace Ataccama\Common\Env;

    /**
     * Interface Databaseable
     * @package Ataccama\Common\Env
     * @deprecated Use new class Storable
     */
    interface Databaseable
    {
        /**
         * Defines array/values for database inserting
         *
         * @deprecated Use new class Storable
         * @return array
         */
        public function row(): array;
    }