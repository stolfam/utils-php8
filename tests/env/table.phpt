<?php
    require __DIR__ . "/../bootstrap.php";

    $row = new \Ataccama\Common\Env\Row([
        new \Ataccama\Common\Env\BoolColumn("foo", true),
        new \Ataccama\Common\Env\BoolColumn("bar", false),
        new \Ataccama\Common\Env\IntegerColumn("foo_id", 269),
        new \Ataccama\Common\Env\NullableStringColumn("name", "foo"),
        new \Ataccama\Common\Env\NullableStringColumn("description", null),
        new \Ataccama\Common\Env\FloatColumn("avg", 3.7)
    ]);

    $array = $row->toArray();

    // testing for correct type
    \Tester\Assert::type("bool", $array['foo']);
    \Tester\Assert::type("bool", $array['bar']);
    \Tester\Assert::type("integer", $array['foo_id']);
    \Tester\Assert::type("string", $array['name']);
    \Tester\Assert::type("null", $array['description']);
    \Tester\Assert::type("float", $array['avg']);

    // testing for values
    \Tester\Assert::same(269, $array['foo_id']);
    \Tester\Assert::same(null, $array['description']);
    \Tester\Assert::same(3.7, $array['avg']);
    \Tester\Assert::same("foo", $array['name']);
    \Tester\Assert::same(true, $array['foo']);
    \Tester\Assert::same(false, $array['bar']);

    // testing for errors
    \Tester\Assert::exception(function () {
        new \Ataccama\Common\Env\BoolColumn("foo", null);
    }, TypeError::class);

    \Tester\Assert::exception(function () {
        new \Ataccama\Common\Env\StringColumn("foo", null);
    }, TypeError::class);

    \Tester\Assert::exception(function () {
        new \Ataccama\Common\Env\FloatColumn("foo", null);
    }, TypeError::class);

    \Tester\Assert::exception(function () {
        new \Ataccama\Common\Env\IntegerColumn("foo", null);
    }, TypeError::class);

    \Tester\Assert::exception(function () {
        $row = new \Ataccama\Common\Env\Row([
            new stdClass()
        ]);
    }, TypeError::class);