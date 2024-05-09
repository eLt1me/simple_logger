<?php

namespace App\Console\Infrastructure;

use App\Console\Application\AbstractLogger;

class ConcreteLogger extends AbstractLogger
{
    public function send(string $message): void
    {
        $loggerStorage = $this->getLoggerStorageByType($this->getType());
        $loggerStorage->save($message);
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        $loggerStorage = $this->getLoggerStorageByType($loggerType);
        $loggerStorage->save($message);
    }

    public function setType(string $type): void
    {
        self::validateLoggerType($type);
        $this->type = $type;
    }
}