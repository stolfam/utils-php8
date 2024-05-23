<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $array = new \Ataccama\Common\Env\BaseArray();

    $array->add(new class implements \Ataccama\Common\Utils\Comparator\Comparable {
        public function getValue(): int
        {
            return 5;
        }
    });
    $array->add(new class implements \Ataccama\Common\Utils\Comparator\Comparable {
        public function getValue(): int
        {
            return 1;
        }
    });
    $array->add(new class implements \Ataccama\Common\Utils\Comparator\Comparable {
        public function getValue(): int
        {
            return 1;
        }
    });
    $array->add(new class implements \Ataccama\Common\Utils\Comparator\Comparable {
        public function getValue(): int
        {
            return 40;
        }
    });
    $array->add(new class implements \Ataccama\Common\Utils\Comparator\Comparable {
        public function getValue(): int
        {
            return 10;
        }
    });

    $array->sort();

    Assert::same(1, $array->get(0)
        ->getValue());
    Assert::same(1, $array->get(1)
        ->getValue());
    Assert::same(5, $array->get(2)
        ->getValue());
    Assert::same(10, $array->get(3)
        ->getValue());
    Assert::same(40, $array->get(4)
        ->getValue());

    $array->sort(\Ataccama\Common\Utils\Comparator\Sorter::DESC);

    Assert::same(1, $array->get(4)
        ->getValue());
    Assert::same(1, $array->get(3)
        ->getValue());
    Assert::same(5, $array->get(2)
        ->getValue());
    Assert::same(10, $array->get(1)
        ->getValue());
    Assert::same(40, $array->get(0)
        ->getValue());

    $array = new \Ataccama\Common\Env\BaseArray();
    $array->add(1);
    $array->add(2);
    $array->add(3);

    Assert::same(false, $array->sort());

    $array_2 = new \Ataccama\Common\Env\BaseArray();
    $array_2->add(10)
        ->add(20)
        ->add(30);
    $array_2->insert($array);

    Assert::count(6, $array_2);

    Assert::same(30, $array_2->get(2));

    $array_2->remove(2);

    Assert::count(5, $array_2);
    Assert::same(null, $array_2->get(2));

    $array_2->remove(0, true);

    Assert::same(20, $array_2->get(0));

    $str_array = new class extends \Ataccama\Common\Env\BaseArray {
        public function add($o): \Ataccama\Common\Env\BaseArray
        {
            $this->items[$o] = $o . $o;

            return $this;
        }
    };

    $str_array->add("str_1");
    $str_array->add("str_2");
    $str_array->add("str_3");

    $str_array->remove("str_2");

    Assert::count(2, $str_array);
    Assert::same("str_3str_3", $str_array->get("str_3"));