<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $cache = new \Ataccama\Common\Utils\Cache\DataStorage(__DIR__ . "/../../tmp");

    $cache->add(new \Ataccama\Common\Utils\Cache\Key(111), new \Ataccama\Common\Env\Pair(12, "Test 1"));
    $cache->add(new \Ataccama\Common\Utils\Cache\Key(999), new \Ataccama\Common\Env\Pair(99, "Test 2"));
    $cache->add(new \Ataccama\Common\Utils\Cache\Key("ABC"), new \Ataccama\Common\Env\Pair("AB", "Test 3"));
    $cache->add(new \Ataccama\Common\Utils\Cache\Key("xxx"), new \Ataccama\Common\Env\Pair("xx", "Test 4"));
    $cache->add(new \Ataccama\Common\Utils\Cache\Key("yyy"), new \Ataccama\Common\Env\Pair("yy", "Test 5"));

    $cache->createDependency(new \Ataccama\Common\Utils\Cache\Key(111), new \Ataccama\Common\Utils\Cache\Key(999));
    $cache->createDependency(new \Ataccama\Common\Utils\Cache\Key(999), new \Ataccama\Common\Utils\Cache\Key("ABC"));
    $cache->createDependency(new \Ataccama\Common\Utils\Cache\Key(111), new \Ataccama\Common\Utils\Cache\Key("xxx"));
    $cache->createDependency(new \Ataccama\Common\Utils\Cache\Key("ABC"), new \Ataccama\Common\Utils\Cache\Key("xxx"));
    $cache->createDependency(new \Ataccama\Common\Utils\Cache\Key("xxx"), new \Ataccama\Common\Utils\Cache\Key("yyy"));

    Assert::same("Test 4", $cache->get(new \Ataccama\Common\Utils\Cache\Key("xxx"))->value);

    $cache->notifyChange(new \Ataccama\Common\Utils\Cache\Key(999));
    $cache->notifyChange(new \Ataccama\Common\Utils\Cache\Key("ABC"));

    Assert::null($cache->get(new \Ataccama\Common\Utils\Cache\Key(999)));
    Assert::null($cache->get(new \Ataccama\Common\Utils\Cache\Key("xxx")));
    Assert::null($cache->get(new \Ataccama\Common\Utils\Cache\Key("ABC")));
    Assert::null($cache->get(new \Ataccama\Common\Utils\Cache\Key("yyy")));

    Assert::same("Test 1", $cache->get(new \Ataccama\Common\Utils\Cache\Key(111))->value);

    $cache->notifyChange(new \Ataccama\Common\Utils\Cache\Key(111));

    $lastKey = null;
    for ($i = 0; $i < 100; $i++) {
        $key = new \Ataccama\Common\Utils\Cache\Key($i);
        $cache->add($key, new \Ataccama\Common\Env\Pair("key_$i", "Test $i"));
        if(isset($lastKey)) {
            $cache->createDependency($key,$lastKey);
        }
        $lastKey = clone $key;
    }

    $cache->notifyChange(new \Ataccama\Common\Utils\Cache\Key(98));
    Assert::null($cache->get(new \Ataccama\Common\Utils\Cache\Key(0)));
    Assert::same("Test 99", $cache->get(new \Ataccama\Common\Utils\Cache\Key(99))->value);

    $cache->notifyChange(new \Ataccama\Common\Utils\Cache\Key(99));
    Assert::null($cache->get(new \Ataccama\Common\Utils\Cache\Key(99)));