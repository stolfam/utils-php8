<?php

    require __DIR__ . "/../bootstrap.php";

    use Ataccama\Common\Utils as Utils;


    $paginators = new Utils\Paginators\PaginatorList();

    $paginators->add((new \Nette\Utils\Paginator())->setItemCount(50)
        ->setPage(2), 'pid');

    \Tester\Assert::same(50, $paginators->pid->itemCount);

    \Tester\Assert::same(2, $paginators->pid->page);

    \Tester\Assert::same(50, $paginators->get('pid')->itemCount);

    \Tester\Assert::same(2, $paginators->get('pid')->page);

    \Tester\Assert::exception(function () use ($paginators) {
        $paginators->xxx->page;
    }, \Ataccama\Common\Exceptions\NotDefined::class);

    \Tester\Assert::exception(function () use ($paginators) {
        $paginators->get('xxx')->itemCount;
    }, \Ataccama\Common\Exceptions\NotDefined::class);

    \Tester\Assert::same('pid', $paginators->get('pid')->getId());