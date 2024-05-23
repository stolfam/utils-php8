<?php

    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;

    use Ataccama\Common\Utils\Messenger as Utils;


    $messenger = new Utils\Messenger();

    $message = new Utils\Message("Test.", Utils\Message::SUCCESS, 200);
    $messenger->add($message);


    Assert::same("Test.", $messenger->getLast()->text);