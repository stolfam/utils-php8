<?php

    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $di = \Ataccama\Common\Utils\DT\DateInterval::create(new DateInterval("PT25M30S"));
    Assert::same(25, $di->i);
    Assert::same(30, $di->s);

    $dtStart = "2000-01-01 12:00:00";
    $dtEnd = "2000-01-01 14:05:00";

    $dr = new \Ataccama\Common\Utils\DateRange(\Nette\Utils\DateTime::from($dtStart),
        \Nette\Utils\DateTime::from($dtEnd));

    Assert::same("2 hours 5 minutes", \Ataccama\Common\Utils\Transformer::dtiToStr($dr));

    Assert::same("2 hours 5 minutes", $dr->getInterval()
        ->__toString());

    Assert::same(2, $dr->interval->h);

    Assert::same((2 * 60 * 60) + (5 * 60), $dr->dTimestamp);

    $di = \Ataccama\Common\Utils\DT\DateInterval::createFromSeconds(100);
    Assert::same(1, $di->i);
    Assert::same(40, $di->s);
    Assert::same("1 minute 40 seconds",$di->__toString());
    $di->showSeconds = false;
    Assert::same("1 minute",$di->__toString());

    $di = \Ataccama\Common\Utils\DT\DateInterval::createFromSeconds(3600 * 25 + 130);
    Assert::same(1, $di->d);
    Assert::same(1, $di->h);
    Assert::same(2, $di->i);
    Assert::same(10, $di->s);