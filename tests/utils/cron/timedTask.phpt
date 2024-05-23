<?php
    require __DIR__ . "/../../bootstrap.php";

    \Ataccama\Utils\Clock::setDataPath(__DIR__ . "/clocks");

    $cron = new \Ataccama\Common\Utils\Cron\Cron();

    $cron->addTask(new class extends \Ataccama\Common\Utils\Cron\TimedTask
    {
        private \Ataccama\Common\Utils\Messenger\Messenger $messenger;

        private int $runs = 1;

        public function __construct()
        {
            $this->messenger = new Ataccama\Common\Utils\Messenger\Messenger();
        }

        public function run(): bool
        {
            $this->messenger->add(new \Ataccama\Common\Utils\Messenger\Message("Run #" . $this->runs++,
                \Ataccama\Common\Utils\Messenger\Message::SUCCESS));

            return true;
        }

        public function getPriority(): int
        {
            return \Ataccama\Common\Utils\Cron\ITask::LOWEST_PRIORITY;
        }

        public function getMessenger(): \Ataccama\Common\Utils\Messenger\Messenger
        {
            return $this->messenger;
        }

        public function getClock(): \Ataccama\Utils\Clock
        {
            return new \Ataccama\Utils\Clock("uniqueId", "2 seconds");
        }
    });

    $cron->run();
    \Tester\Assert::count(1, $cron->messenger);

    $cron->run();

    \Tester\Assert::count(1, $cron->messenger);

    sleep(3);

    $cron->run();

    \Tester\Assert::count(2, $cron->messenger);

    (new \Ataccama\Utils\Clock("uniqueId", "2 seconds"))->reset();