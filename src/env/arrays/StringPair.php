<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env\Arrays;

    use Ataccama\Common\Env\Interfaces\IStringPair;
    use Ataccama\Common\Env\Pair;


    /**
     * Class StringPair
     * @package Ataccama\Common\Env\Arrays
     */
    class StringPair extends Pair implements IStringPair
    {
        /**
         * StringPair constructor.
         * @param string      $key
         * @param string|null $value
         */
        public function __construct(string $key, ?string $value)
        {
            parent::__construct($key, $value);
        }

        public function getKey(): string
        {
            return parent::getKey();
        }

        public function getValue(): ?string
        {
            return parent::getValue();
        }
    }