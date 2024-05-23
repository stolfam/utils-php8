<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Cache;

    use Ataccama\Common\Env\IEntry;
    use Nette\SmartObject;


    /**
     * Class EntryKey
     * @package    Ataccama\Common\Utils\Cache
     * @property-read mixed  $id
     * @property-read string $prefix
     * @deprecated Implement your own IKey class
     */
    abstract class EntryKey implements IKey
    {
        use SmartObject;


        protected string $id;

        /**
         * ContentKey constructor.
         * @param IEntry $entry
         */
        public function __construct(IEntry $entry)
        {
            $this->id = $entry->id;
        }

        /**
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }
    }