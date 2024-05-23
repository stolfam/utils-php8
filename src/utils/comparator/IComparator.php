<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Comparator;

    /**
     * Interface Comparator
     * @package Ataccama\Common\Utils\Comparator
     */
    interface IComparator
    {
        /**
         * @param Comparable $obj1
         * @param Comparable $obj2
         * @return bool
         */
        public function greater(Comparable $obj1, Comparable $obj2): bool;

        /**
         * @param Comparable $obj1
         * @param Comparable $obj2
         * @return bool
         */
        public function equal(Comparable $obj1, Comparable $obj2): bool;

        /**
         * @param Comparable $obj1
         * @param Comparable $obj2
         * @return bool
         */
        public function less(Comparable $obj1, Comparable $obj2): bool;
    }