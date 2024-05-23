<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class Message
     * @package Ataccama\Common\Env
     */
    class Message
    {
        public string $text;

        /**
         * Message constructor.
         * @param string $text
         */
        public function __construct(string $text)
        {
            $this->text = $text;
        }
    }