<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $person = new \Ataccama\Common\Env\Person(1, new \Ataccama\Common\Env\Name("Miroslav Stolfa"),
        new \Ataccama\Common\Env\Email("miroslav.stolfa@ataccama.com"));

    Assert::same("ataccama.com", $person->email->domain);

    Assert::same("Miroslav", $person->name->first);

    Assert::same("Stolfa", $person->name->last);

    Assert::same("Miroslav Stolfa", $person->name->full);

    Assert::same("1", $person->id);