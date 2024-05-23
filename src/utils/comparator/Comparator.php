<?php

    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Comparator;

    /**
     * Class Comparator
     * @package Ataccama\Common\Utils\Comparator
     */
    class Comparator implements IComparator
    {
        public function greater(Comparable $obj1, Comparable $obj2): bool
        {
            if ($obj1->getValue() > $obj2->getValue()) {
                return true;
            }

            return false;
        }

        public function equal(Comparable $obj1, Comparable $obj2): bool
        {
            if ($obj1->getValue() == $obj2->getValue()) {
                return true;
            }

            return false;
        }

        public function less(Comparable $obj1, Comparable $obj2): bool
        {
            if ($obj1->getValue() < $obj2->getValue()) {
                return true;
            }

            return false;
        }
    }