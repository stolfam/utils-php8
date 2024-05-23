<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class EntryList
     * @package Ataccama\Common\Env
     */
    class EntryList extends BaseArray
    {
        /**
         * Adds IEntry to array.
         *
         * @param IEntry $entry
         * @return EntryList
         */
        public function add($entry): self
        {
            $this->items[$entry->id] = $entry;

            return $this;
        }

        /**
         * @return IEntry
         */
        public function current(): IEntry
        {
            return parent::current();
        }

        /**
         * @return int[]|string[]
         */
        public function toIds(): array
        {
            $array = [];

            foreach ($this as $entry) {
                $array[] = $entry->id;
            }

            return $array;
        }
    }