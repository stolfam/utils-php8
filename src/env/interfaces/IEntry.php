<?php

    namespace Ataccama\Common\Env;

    /**
     * Interface IEntry
     *
     * @deprecated Use interface IdentifiableByInteger or IdentifiableByString
     *
     * @package Ataccama\Common\Env
     * @property-read $id
     */
    interface IEntry
    {
        public function getId();
    }