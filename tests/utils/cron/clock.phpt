<?php
    require __DIR__ . "/../../bootstrap.php";

    \Ataccama\Utils\Clock::setDataPath(__DIR__ . "/clocks");

    $clock = new \Ataccama\Utils\Clock("someUniqueId", "1 seconds");

    if ($clock->nextTick()) {
        $clock->tick();
    }

    \Tester\Assert::same(false, $clock->nextTick());

    sleep(2);

    \Tester\Assert::same(true, $clock->nextTick());

    $clock->reset();