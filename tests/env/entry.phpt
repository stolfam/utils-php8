<?php

    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $entry_1 = new \Ataccama\Common\Env\Entry(1);
    $entry_2 = new \Ataccama\Common\Env\Entry(2);
    $entry_3 = new \Ataccama\Common\Env\Entry(3);

    $ids = \Ataccama\Common\Env\Entry::toIds([
        $entry_1,
        $entry_2,
        $entry_3
    ]);

    Assert::count(3, $ids);
    Assert::same('1', $ids->get(0));
    Assert::same('2', $ids->get(1));
    Assert::same('3', $ids->get(2));