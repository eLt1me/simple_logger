<?php

namespace App\Console\Application;

use App\Console\Application\Factory\LoggerFactory;
use App\Console\Domain\Interfaces\LoggerInterface;
use App\Console\Domain\Interfaces\LoggerStorageInterface;

abstract class AbstractLogger implements LoggerInterface
{
    const TYPE_EMAIL = 'email';
    const TYPE_DB = 'db';
    const TYPE_FILE = 'file';
    const DEFAULT_TYPE = self::TYPE_FILE;

    /**
     * the strategy by which logging will be performed
     * @var string
     */
    protected string $type;
    /**
     * @var LoggerStorageInterface[]
     */
    protected static array $loggerStorageSingletons = [];

    public static function getAllowedLoggerTypes()
    {
        return [
            self::TYPE_EMAIL,
            self::TYPE_DB,
            self::TYPE_FILE,
        ];
    }

    public function getType(): string
    {
        return $this->type ?? self::DEFAULT_TYPE;
    }

    public static function validateLoggerType(string $type)
    {
        if (!in_array($type, self::getAllowedLoggerTypes())) {
            throw new \Exception('Invalid logger type!');
        }
        return true;
    }

    protected function getLoggerStorageByType(?string $type = null, $getNewInstance = false): LoggerStorageInterface
    {
        $type = $type ?? $this->getType();
        self::validateLoggerType($type);
        if (isset(static::$loggerStorageSingletons[$type]) && !$getNewInstance) {
            $logger = static::$loggerStorageSingletons[$type];
        } else {
            $logger = LoggerFactory::create($type);
            static::$loggerStorageSingletons[$type] = $logger;
        }
        return $logger;
    }
}