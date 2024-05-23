<?php
    declare(strict_types=1);

    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $map = new \Ataccama\Common\Env\Map();
    $map->add(10)
        ->add(20, "key1")
        ->add(30, "key2");

    $map2 = new \Ataccama\Common\Env\Map();
    $map2->add("A", "keyA")
        ->add("B", "keyB")
        ->add("C", "key1");
    $map->insert($map2);

    Assert::count(5, $map);
    Assert::same("C", $map->get("key1"));


    $map = new \Ataccama\Common\Env\Map();
    $map->add(10)
        ->add(20, "key1");

    $map2 = new \Ataccama\Common\Env\Map();
    $map2->add("A")
        ->add("B", "key1");
    $map->insert($map2, false);

    Assert::same(20, $map->get("key1"));