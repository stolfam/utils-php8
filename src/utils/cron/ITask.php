<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Cron;

    use Ataccama\Common\Utils\Messenger\Messenger;


    /**
     * Interface ITask
     * @package Ataccama\Utils\Cron
     * @property-read int $priority
     */
    interface ITask
    {
        /** @var int */
        const HIGHEST_PRIORITY = 100;

        /** @var int */
        const LOWEST_PRIORITY = 0;

        /**
         * @return bool
         */
        public function run(): bool;

        /**
         * @return int
         */
        public function getPriority(): int;

        /**
         * @return Messenger
         */
        public function getMessenger(): Messenger;
    }