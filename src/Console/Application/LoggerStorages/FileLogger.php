<?php

namespace App\Console\Application\LoggerStorages;

use App\Console\Domain\Interfaces\LoggerStorageInterface;

class FileLogger implements LoggerStorageInterface
{
    public function __construct(
        private readonly string $fileName
    )
    {
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function save(string $message)
    {
        var_dump('Message "' . $message . '" saved to file ' . $this->getFileName() . ' with: ' . __CLASS__);
    }
}