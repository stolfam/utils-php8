<?php

    declare(strict_types=1);

    namespace Ataccama\Common\Interfaces;

    /**
     * Interface IdentifiableByInteger
     * @package Ataccama\Common\Interfaces
     */
    interface IdentifiableByInteger
    {
        public function getId(): int;
    }