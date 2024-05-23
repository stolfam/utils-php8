<?php

    namespace Ataccama\Common\Env;

    use Nette\SmartObject;


    /**
     * Class Entry
     *
     * @deprecated Use IntegerId or StringId
     *
     * @package    Ataccama\Common\Env
     * @property-read string $id
     */
    class Entry implements IEntry
    {
        use SmartObject;


        /** @var string */
        protected string $id;

        /**
         * Entry constructor.
         * @param string $id
         */
        public function __construct(string $id)
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * @param IEntry[] $entries
         * @return BaseArray
         * @deprecated
         */
        public static function toIds(array $entries): BaseArray
        {
            $array = new BaseArray();

            foreach ($entries as $entry) {
                $array->add($entry->id);
            }

            return $array;
        }
    }