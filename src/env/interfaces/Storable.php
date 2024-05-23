<?php

    namespace Ataccama\Common\Env;

    use Ataccama\Common\Env\Arrays\StringPairArray;


    /**
     * Interface Storable
     * @package Ataccama\Common\Env
     * @deprecated Use new interface IStorable
     */
    interface Storable
    {
        public function toPairs(): StringPairArray;
    }