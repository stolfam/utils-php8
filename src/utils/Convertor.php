<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils;

    /**
     * Class Convertor
     * @package Ataccama\Common\Utils
     */
    class Convertor
    {
        public static function toBase(int $num, int $b = 62): string
        {
            $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $r = $num % $b;
            $res = $base[$r];
            $q = floor($num / $b);
            while ($q) {
                $r = $q % $b;
                $q = floor($q / $b);
                $res = $base[$r] . $res;
            }

            return $res;
        }

        public static function to10(string $num, int $b = 62): int
        {
            $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $limit = strlen($num);
            $res = strpos($base, $num[0]);
            for ($i = 1; $i < $limit; $i++) {
                $res = $b * $res + strpos($base, $num[$i]);
            }

            return $res;
        }

        public static function base64url_encode($data)
        {
            return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
        }

        public static function base64url_decode($data)
        {
            return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
        }
    }