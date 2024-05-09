<?php

namespace App\Console\Infrastructure\Helpers;

class CommonHelper
{
    public static function getAppConfig()
    {
        return require BASE_PATH . DIRECTORY_SEPARATOR . 'Console/config.php';
    }
}