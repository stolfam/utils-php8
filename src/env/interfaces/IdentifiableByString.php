<?php

    declare(strict_types=1);

    namespace Ataccama\Common\Interfaces;

    /**
     * Interface IdentifiableByString
     * @package Ataccama\Common\Interface
     */
    interface IdentifiableByString
    {
        public function getId(): string;
    }