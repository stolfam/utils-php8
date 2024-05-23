<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils;

    use Nette\Utils\DateTime;


    /**
     * Class Transformer
     * @package Ataccama\Common\Utils
     */
    class Transformer
    {
        /**
         * Transforms DateTime|string into human-readable text with "ago" at the end.
         * For example: 34 minutes ago
         *
         * @param null $dt
         * @return string
         */
        public static function dtAgo($dt = null): string
        {
            if (!isset($dt)) {
                return "not yet";
            }

            $date = DateTime::from($dt);

            $timestamp = $date->getTimestamp();

            $seconds = time() - $timestamp;

            if ($seconds < 0) {
                return "";
            }

            $minutes = round($seconds / 60);
            $hours = round($seconds / 60 / 60);
            $d = round($seconds / 60 / 60 / 24);
            $m = round($seconds / 60 / 60 / 24 / 30);
            $y = round($seconds / 60 / 60 / 24 / 365);

            if ($seconds < 60) {
                return "a moment ago";
            } elseif ($minutes < 60) {
                return "$minutes minutes ago";
            } elseif ($hours < 24) {
                return "$hours hours ago";
            } elseif ($d < 30) {
                return "$d days ago";
            } elseif ($m < 12) {
                return "$m months ago";
            } else {
                return "$y years ago";
            }
        }

        /**
         * Transforms DateRange into human-readable string.
         *
         * @param DateRange|null $dr
         * @return string
         * @deprecated
         */
        public static function dtiToStr(DateRange $dr = null): string
        {
            if (!isset($dr)) {
                return "";
            }
            try {
                return (\Ataccama\Common\Utils\DT\DateInterval::create($dr->getInterval()))->__toString();
            } catch (\Throwable $t) {
                return "";
            }
        }
    }