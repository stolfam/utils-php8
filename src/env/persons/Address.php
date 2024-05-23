<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env\User;

    /**
     * Class Address
     * @package Ataccama\Common\Env\User
     */
    class Address
    {
        public string $street;
        public string $city;
        public string $postcode;
        public string $country;
        public string|null $state;
        public string|null $additionalDetail;

        /**
         * Address constructor.
         * @param string      $street
         * @param string      $city
         * @param string      $postcode
         * @param string      $country
         * @param string|null $state
         * @param string|null $additionalDetail
         */
        public function __construct(
            string $street,
            string $city,
            string $postcode,
            string $country,
            ?string $state = null,
            ?string $additionalDetail = null
        ) {
            $this->street = $street;
            $this->city = $city;
            $this->postcode = $postcode;
            $this->country = $country;
            $this->state = $state;
            $this->additionalDetail = $additionalDetail;
        }
    }