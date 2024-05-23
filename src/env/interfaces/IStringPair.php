<?php

    namespace Ataccama\Common\Env\Interfaces;

    use Ataccama\Common\Env\IPair;


    /**
     * Interface IStringPair
     * @package Ataccama\Common\Env\Arrays
     */
    interface IStringPair extends IPair
    {
        public function getKey(): string;

        public function getValue(): ?string;
    }