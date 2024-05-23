<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils;

    /**
     * Class JWT
     * @package Ataccama\Common\Utils
     */
    class JWT
    {
        /**
         * @param array  $header
         * @param array  $payload
         * @param string $secret
         * @param string $algo
         * @return string
         */
        public static function encode(array $header, array $payload, string $secret, string $algo = "SHA256"): string
        {
            $headerEncoded = Convertor::base64url_encode(json_encode($header));

            $payloadEncoded = Convertor::base64url_encode(json_encode($payload));

            $dataEncoded = "$headerEncoded.$payloadEncoded";

            $rawSignature = hash_hmac("SHA256", $dataEncoded, $secret, true);

            $signatureEncoded = Convertor::base64url_encode($rawSignature);

            return "$dataEncoded.$signatureEncoded";
        }
    }