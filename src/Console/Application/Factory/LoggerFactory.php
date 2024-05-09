<?php

namespace App\Console\Application\Factory;

use App\Console\Application\AbstractLogger;
use App\Console\Application\LoggerStorages\DbLogger;
use App\Console\Application\LoggerStorages\EmailLogger;
use App\Console\Application\LoggerStorages\FileLogger;
use App\Console\Domain\Interfaces\LoggerStorageInterface;
use App\Console\Infrastructure\Helpers\CommonHelper;

class LoggerFactory
{
    public static function create(string $type, array $params = null): LoggerStorageInterface
    {
        AbstractLogger::validateLoggerType($type);
        $params = $params ?? CommonHelper::getAppConfig();
        return match ($type) {
            AbstractLogger::TYPE_EMAIL => new EmailLogger($params['email']),
            AbstractLogger::TYPE_DB => new DbLogger($params['dsn']),
            AbstractLogger::TYPE_FILE => new FileLogger($params['log_file_name']),
            default => throw new \Exception('Unrecognized case.'),
        };
    }
}