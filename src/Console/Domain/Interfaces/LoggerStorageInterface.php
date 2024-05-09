<?php

namespace App\Console\Domain\Interfaces;

interface LoggerStorageInterface
{
    public function save(string $message);
}