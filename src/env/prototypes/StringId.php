<?php

    declare(strict_types=1);

    namespace Ataccama\Common\Env\Prototypes;

    use Ataccama\Common\Interfaces\IdentifiableByString;
    use Nette\SmartObject;


    /**
     * Class StringId
     * @package Ataccama\Common\Env\Prototypes
     * @property-read string $id
     */
    class StringId implements IdentifiableByString
    {
        use SmartObject;

        protected string $id;

        /**
         * StringId constructor.
         * @param string $id
         */
        public function __construct(string $id)
        {
            $this->id = $id;
        }

        public function getId(): string
        {
            return $this->id;
        }
    }