<?php

namespace App\Console\Application\LoggerStorages;

use App\Console\Domain\Interfaces\LoggerStorageInterface;

class DbLogger implements LoggerStorageInterface
{
    public function save(string $message)
    {
        var_dump('Message "' . $message . '" saved with: ' . __CLASS__);
    }
}