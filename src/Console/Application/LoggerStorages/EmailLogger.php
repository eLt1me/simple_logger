<?php

namespace App\Console\Application\LoggerStorages;

use App\Console\Domain\Interfaces\LoggerStorageInterface;

class EmailLogger implements LoggerStorageInterface
{

    public function __construct(
        private readonly string $email
    )
    {
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function save(string $message)
    {
        var_dump('Message "' . $message . '" was sent to "' . $this->getEmail() . '" with: ' . __CLASS__);
    }
}