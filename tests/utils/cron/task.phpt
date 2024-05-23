<?php
    require __DIR__ . "/../../bootstrap.php";

    $cron = new \Ataccama\Common\Utils\Cron\Cron();

    $cron->addTask(new class implements \Ataccama\Common\Utils\Cron\ITask
    {
        private $messenger;

        public function __construct()
        {
            $this->messenger = new Ataccama\Common\Utils\Messenger\Messenger();
        }

        public function run(): bool
        {
            $this->messenger->add(new \Ataccama\Common\Utils\Messenger\Message("Test Message"));

            return false;
        }

        public function getPriority(): int
        {
            return \Ataccama\Common\Utils\Cron\ITask::LOWEST_PRIORITY;
        }

        public function getMessenger(): \Ataccama\Common\Utils\Messenger\Messenger
        {
            return $this->messenger;
        }
    });

    $cron->run();

    \Tester\Assert::count(1, $cron->messenger);