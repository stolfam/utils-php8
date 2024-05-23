<?php
    require __DIR__ . "/bootstrap.php";

    \Tester\Assert::same(false, headers_sent());