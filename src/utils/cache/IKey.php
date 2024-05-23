<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Cache;

    use Ataccama\Common\Interfaces\IdentifiableByString;


    /**
     * Interface IKey
     * @package Ataccama\Common\Utils\Cache
     */
    interface IKey extends IdentifiableByString
    {
        public function getPrefix(): ?string;
    }