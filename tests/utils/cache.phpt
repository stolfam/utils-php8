<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $cache = new \Ataccama\Common\Utils\Cache\DataStorage(__DIR__ . "/../../tmp");

    $pair = new \Ataccama\Common\Env\Pair(123, "Test");

    $key = new \Ataccama\Common\Utils\Cache\Key($pair->key);

    $cache->add($key, $pair);

    Assert::same("Test", $cache->get($key)->value);

    $cache->notifyChange($key);

    Assert::null($cache->get($key));