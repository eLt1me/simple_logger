<?php

namespace App\Console\Application\LoggerStorages;

use App\Console\Domain\Interfaces\LoggerStorageInterface;

class DbLogger implements LoggerStorageInterface
{
    public function getDsn()
    {
        return $this->dsn;
    }

    public function __construct(
        private readonly string $dsn,
    )
    {
    }

    public function save(string $message)
    {
        var_dump('Message "' . $message . '" was sent to db "' . $this->getDsn() . '" with: ' . __CLASS__);
    }
}