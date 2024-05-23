<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env\Persons;

    use Ataccama\Common\Env\BaseArray;
    use Ataccama\Common\Env\Person;


    /**
     * Class PersonList
     * @package Ataccama\Common\Env
     */
    class PersonList extends BaseArray
    {
        /**
         * @param Person $person
         * @return PersonList
         */
        public function add($person): self
        {
            $this->items[$person->id] = $person;

            return $this;
        }

        /**
         * @return Person
         */
        public function current(): Person
        {
            return parent::current();
        }

        /**
         * @param $i
         * @return Person
         */
        public function get($i): Person
        {
            return parent::get($i);
        }
    }