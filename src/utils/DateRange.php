<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils;

    use Nette\SmartObject;
    use Nette\Utils\DateTime;


    /**
     * Class DateRange
     * @package Ataccama\Common\Utils
     * @property-read \DateInterval $interval
     * @property-read int           $dTimestamp
     */
    class DateRange
    {
        use SmartObject;


        /** @var DateTime */
        public DateTime $from;

        /** @var DateTime|null */
        public ?DateTime $to;

        /**
         * DateInterval constructor.
         * @param DateTime      $from
         * @param DateTime|null $to
         */
        public function __construct(DateTime $from, DateTime $to = null)
        {
            $this->from = $from;
            $this->to = $to;
        }

        /**
         * @return \Ataccama\Common\Utils\DT\DateInterval
         * @throws \Exception
         */
        public function getInterval(): \Ataccama\Common\Utils\DT\DateInterval
        {
            $d = $this->from->diff($this->to);

            return \Ataccama\Common\Utils\DT\DateInterval::create($d);
        }

        /**
         * Returns a difference between FROM and TO in seconds.
         *
         * @return int
         */
        public function getDTimestamp(): int
        {
            return $this->to->getTimestamp() - $this->from->getTimestamp();
        }
    }