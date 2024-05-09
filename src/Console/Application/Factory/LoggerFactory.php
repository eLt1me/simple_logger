<?php

namespace App\Console\Application\Factory;

use App\Console\Application\AbstractLogger;
use App\Console\Application\LoggerStorages\DbLogger;
use App\Console\Application\LoggerStorages\EmailLogger;
use App\Console\Application\LoggerStorages\FileLogger;
use App\Console\Domain\Interfaces\LoggerStorageInterface;

class LoggerFactory
{
    public static function create(string $type): LoggerStorageInterface
    {
        AbstractLogger::validateLoggerType($type);
        return match ($type) {
            AbstractLogger::TYPE_EMAIL => new EmailLogger(),
            AbstractLogger::TYPE_DB => new DbLogger(),
            AbstractLogger::TYPE_FILE => new FileLogger(),
            default => throw new \Exception('Unrecognized case.'),
        };
    }
}