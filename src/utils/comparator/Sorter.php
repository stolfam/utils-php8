<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Comparator;

    /**
     * Class Sorter
     * @package Ataccama\Common\Utils\Comparator
     */
    class Sorter
    {
        const DESC = false;
        const ASC = true;

        /**
         * @param Comparable[] $array
         * @param IComparator  $comparator
         * @param bool         $type
         * @return Comparable[]
         */
        public static function sort(array &$array, IComparator $comparator, bool $type = self::ASC): array
        {
            $keys = array_keys($array);

            $sorted = false;
            while (!$sorted) {
                $sorted = true;
                for ($i = 0; $i < count($keys) - 1; $i++) {
                    if ($type) {
                        if ($comparator->greater($array[$keys[$i]], $array[$keys[$i + 1]])) {
                            $tmp = $array[$keys[$i]];
                            $array[$keys[$i]] = $array[$keys[$i + 1]];
                            $array[$keys[$i + 1]] = $tmp;
                            $sorted = false;
                        }
                    } else {
                        if ($comparator->less($array[$keys[$i]], $array[$keys[$i + 1]])) {
                            $tmp = $array[$keys[$i]];
                            $array[$keys[$i]] = $array[$keys[$i + 1]];
                            $array[$keys[$i + 1]] = $tmp;
                            $sorted = false;
                        }
                    }
                }
            }

            return $array;
        }
    }