<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    use Nette\SmartObject;


    /**
     * Trait BaseEntry
     * @package Ataccama\Common\Traits
     * @property-read mixed $id
     * @deprecated Use IdentifiedByInteger or IdentifiedByString
     */
    trait BaseEntry
    {
        use SmartObject;


        /** @var mixed */
        protected mixed $id;

        /**
         * @return mixed
         */
        public function getId(): mixed
        {
            return $this->id;
        }
    }