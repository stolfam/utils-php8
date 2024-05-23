<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Cron;

    use Ataccama\Common\Utils\Messenger\Message;
    use Ataccama\Common\Utils\Messenger\Messenger;


    /**
     * Class Cron
     * @package Stolfam\Cron
     */
    class Cron
    {
        /** @var ITask[] */
        private array $tasks = [];

        /** @var Messenger */
        public Messenger $messenger;

        /**
         * Cron constructor.
         */
        public function __construct()
        {
            $this->messenger = new Messenger();
        }

        /**
         * @param ITask $task
         */
        public function addTask(ITask $task): void
        {
            $this->tasks[] = $task;
        }

        /**
         * Runs all added tasks.
         */
        public function run(): void
        {
            foreach ($this->tasks as $task) {
                try {
                    if ($task instanceof TimedTask) {
                        if ($task->isRunnable()) {
                            $task->run();
                        }
                    } else {
                        $task->run();
                    }
                } catch (\Throwable $e) {
                    $this->messenger->add(new Message(get_class($task) . ": " . $e->getMessage(), Message::ERROR,
                        $e->getCode()));
                }
                foreach ($task->getMessenger() as $message) {
                    $this->messenger->add($message);
                }
            }
        }
    }