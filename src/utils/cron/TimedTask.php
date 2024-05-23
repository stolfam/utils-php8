<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Cron;

    use Ataccama\Utils\Clock;


    /**
     * Class TimedTask
     * @package Ataccama\Utils\Cron
     */
    abstract class TimedTask implements ITask
    {
        public function isRunnable(): bool
        {
            if ($this->getClock()
                ->nextTick()) {
                $this->getClock()
                    ->tick();

                return true;
            }

            return false;
        }

        /**
         * Timing of the trigger.
         *
         * @return Clock
         */
        public abstract function getClock(): Clock;
    }