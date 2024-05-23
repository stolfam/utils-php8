<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $comparableItem1 = new class implements \Ataccama\Common\Utils\Comparator\Comparable
    {
        public function getValue(): int
        {
            return -10;
        }
    };

    $comparableItem2 = new class implements \Ataccama\Common\Utils\Comparator\Comparable
    {
        public function getValue(): int
        {
            return 10;
        }
    };

    $comparator = new \Ataccama\Common\Utils\Comparator\Comparator();

    Assert::same(false, $comparator->equal($comparableItem1, $comparableItem2));

    Assert::same(false, $comparator->greater($comparableItem1, $comparableItem2));

    Assert::same(true, $comparator->less($comparableItem1, $comparableItem2));

    $comparableItem3 = new class implements \Ataccama\Common\Utils\Comparator\Comparable
    {
        public function getValue(): int
        {
            return 5;
        }
    };

    $comparableItem4 = new class implements \Ataccama\Common\Utils\Comparator\Comparable
    {
        public function getValue(): int
        {
            return 5;
        }
    };

    $comparableItem5 = new class implements \Ataccama\Common\Utils\Comparator\Comparable
    {
        public function getValue(): int
        {
            return 20;
        }
    };

    $array = [
        $comparableItem3,
        $comparableItem2,
        $comparableItem1,
        $comparableItem4,
        $comparableItem5
    ];

    \Ataccama\Common\Utils\Comparator\Sorter::sort($array, $comparator);

    Assert::same(-10, $array[0]->getValue());

    \Ataccama\Common\Utils\Comparator\Sorter::sort($array, $comparator, \Ataccama\Common\Utils\Comparator\Sorter::DESC);

    Assert::same(20, $array[0]->getValue());