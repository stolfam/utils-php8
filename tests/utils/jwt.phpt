<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $jwt = \Ataccama\Common\Utils\JWT::encode(["test" => "1"], ["text" => "Test."], "abcxyz123");

    Assert::same("eyJ0ZXN0IjoiMSJ9.eyJ0ZXh0IjoiVGVzdC4ifQ.1K5DYJ-rLYbnjXcOtmYkrLRtEejqrTLzaYbrH0xhJFw", $jwt);