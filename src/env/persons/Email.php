<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    use Nette\SmartObject;
    use Nette\Utils\Strings;


    /**
     * Class Email
     * @package Ataccama\Common\Env
     * @property-read string $domain
     */
    class Email
    {
        use SmartObject;


        /** @var string */
        public string $definition;

        /**
         * Email constructor.
         * @param string $definition
         */
        public function __construct(string $definition)
        {
            $this->definition = $definition;
        }

        /**
         * @return string|null
         */
        public function getDomain(): ?string
        {
            $exploded = explode("@", $this->definition);

            if (isset($exploded[1])) {
                return $exploded[1];
            }

            return null;
        }

        public function __toString()
        {
            return $this->definition;
        }

        /**
         * @param string $separator
         * @return Name|null
         */
        public function extractName(string $separator = "."): ?Name
        {
            $username = $this->getUsername();
            if (!empty($username)) {
                $extractedNameFromEmail = explode($separator, $username);
                $names = [];
                foreach ($extractedNameFromEmail as $name) {
                    $names[] = Strings::firstUpper($name);
                }
                if (count($names) > 0) {
                    return new \Ataccama\Common\Env\Name(implode(" ", $names));
                }
            }

            return null;
        }

        public function getUsername(): ?string
        {
            $exploded = explode("@", $this->definition);

            if (isset($exploded[0])) {
                return $exploded[0];
            }

            return null;
        }
    }