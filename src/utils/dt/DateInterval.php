<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\DT;


    /**
     * Class DateInterval
     * @package Ataccama\Common\Utils\DT
     */
    class DateInterval extends \DateInterval
    {
        /**
         * Flag
         * Uses in __toString() method
         *
         * @var bool
         */
        public bool $showSeconds = true;

        public function __toString(): string
        {
            $str = "";

            if ($this->y > 0) {
                $str .= "$this->y year" . ($this->y > 1 ? "s" : "") . " ";
            }
            if ($this->m > 0) {
                $str .= "$this->m month" . ($this->m > 1 ? "s" : "") . " ";
            }
            if ($this->d > 0) {
                $str .= "$this->d day" . ($this->d > 1 ? "s" : "") . " ";
            }
            if ($this->h > 0) {
                $str .= "$this->h hour" . ($this->h > 1 ? "s" : "") . " ";
            }
            if ($this->i > 0) {
                $str .= "$this->i minute" . ($this->i > 1 ? "s" : "") . " ";
            }
            if (empty($str) || $this->showSeconds) {
                if ($this->s > 0) {
                    $str .= "$this->s second" . ($this->s > 1 ? "s" : "") . " ";
                }
            }

            return trim($str);
        }

        /**
         * @param \DateInterval $dateInterval
         * @return DateInterval
         * @throws \Exception
         */
        public static function create(\DateInterval $di): DateInterval
        {
            return new DateInterval($di->format("P%yY%mM%dDT%HH%IM%SS"));
        }

        /**
         * Returns DateInterval contains only days, hours, minutes and seconds. Any months neither years.
         *
         * @param int $seconds
         * @return DateInterval
         * @throws \Exception
         */
        public static function createFromSeconds(int $seconds): DateInterval
        {
            $days = (int) ($seconds / (60 * 60 * 24));
            $seconds = round($seconds % (60 * 60 * 24));

            $hours = (int) ($seconds / (60 * 60));
            $seconds = round($seconds % (60 * 60));

            $minutes = (int) ($seconds / 60);
            $seconds = round($seconds % 60);

            return new DateInterval("P$days" . "DT$hours" . "H" . $minutes . "M" . $seconds . "S");
        }
    }