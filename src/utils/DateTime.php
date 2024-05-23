<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils;

    /**
     * Class DateTime
     * @package Ataccama\Common\Utils
     */
    class DateTime extends \Nette\Utils\DateTime
    {
        /**
         * @return DateTime
         * @throws \Exception
         */
        public static function now(): DateTime
        {
            return DateTime::from("now");
        }
    }