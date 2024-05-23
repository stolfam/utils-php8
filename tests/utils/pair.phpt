<?php
    require __DIR__ . "/../bootstrap.php";

    use Ataccama\Common\Env as Env;
    use Tester\Assert;


    $pair = new Env\Pair("abc", "xyz");

    Assert::same("abc", $pair->key);

    Assert::same("xyz", $pair->value);

    $pairArray = new Env\PairArray([$pair]);

    $pairArray->add($pair);

    Assert::same(2, count($pairArray));

    Assert::same("xyz", $pairArray->tryToGetByKey("abc")->value);

    // toArray() unified
    Assert::same(1, count($pairArray->toArray()));

    Assert::same("xyz", $pairArray->toArray()["abc"]);

    $stringPairs = new Env\Arrays\StringPairArray([
        new Env\Arrays\StringPair("A", "AAA"),
        new Env\Arrays\StringPair("B", "BBB"),
        new Env\Arrays\StringPair("C", "CCC"),
        new Env\Arrays\StringPair("E", null)
    ]);

    $stringPairs->add(new Env\Arrays\StringPair("D", "DDD"));

    Assert::count(5, $stringPairs);

    Assert::same("BBB", $stringPairs->get("B")->getValue());
    Assert::same("DDD", $stringPairs->get("D")->getValue());

    Assert::same("A", $stringPairs->current()->getKey());

    Assert::same("CCC", $stringPairs->toArray()["C"]);