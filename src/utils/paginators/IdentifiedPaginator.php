<?php

    namespace Ataccama\Common\Utils\Paginators;

    use Ataccama\Common\Env\IEntry;
    use Nette\Utils\Paginator;


    /**
     * Class IdentifiedPaginator
     * @package Ataccama\Common\Utils\Paginators
     * @property-read string $id
     */
    class IdentifiedPaginator extends Paginator implements IEntry
    {
        /** @var string */
        protected $id;

        /**
         * IdentifiedPaginator constructor.
         * @param string $id
         */
        public function __construct(string $id)
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param string    $id
         * @param Paginator $paginator
         * @return IdentifiedPaginator
         */
        public static function create(string $id, Paginator $paginator): IdentifiedPaginator
        {
            $p = new IdentifiedPaginator($id);
            $p->setItemsPerPage($paginator->itemsPerPage);
            $p->setPage($paginator->page);
            $p->setBase($paginator->base);
            $p->setItemCount($paginator->itemCount);

            return $p;
        }
    }