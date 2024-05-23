<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    $databaseable = new class implements \Ataccama\Common\Env\Databaseable
    {
        public function row(): array
        {
            return [
                "name" => "test"
            ];
        }
    };

    Assert::same("test", $databaseable->row()["name"]);