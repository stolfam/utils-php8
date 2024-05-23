<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class Person
     * @package Ataccama\Common\Env
     * @deprecated
     */
    class Person extends Entry
    {
        /** @var Name */
        public Name $name;

        /** @var Email */
        public Email $email;

        /**
         * Person constructor.
         * @param mixed $id
         * @param Name  $name
         * @param Email $email
         */
        public function __construct(mixed $id, Name $name, Email $email)
        {
            parent::__construct((string) $id);
            $this->email = $email;
            $this->name = $name;
        }
    }