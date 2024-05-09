<?php

use App\Console\Application\AbstractLogger;
use App\Console\Infrastructure\ConcreteLogger;

require_once dirname(__DIR__) . '/../vendor/autoload.php';
$logger = new ConcreteLogger();
/**
 * Testing build in logger (from $type property)
 * ------------
 */
$logger->send('Test default storage (must be: \'' . AbstractLogger::DEFAULT_TYPE . '\')');
//------------
$logger->setType(AbstractLogger::TYPE_EMAIL);
$logger->send('Test ' . AbstractLogger::TYPE_EMAIL . ' storage');
//------------
$logger->setType(AbstractLogger::TYPE_DB);
$logger->send('Test ' . AbstractLogger::TYPE_DB . ' storage');
//------------
$logger->setType(AbstractLogger::TYPE_EMAIL);
$logger->send('Test ' . AbstractLogger::TYPE_EMAIL . ' storage');

/**
 * Testing external logger (singleton used to prevent the creation of multiple logger storage instances)
 * ------------
 */
$logger->sendByLogger('Test with specific logger type: \'' . AbstractLogger::TYPE_FILE . '\'', AbstractLogger::TYPE_FILE);
$logger->sendByLogger('Test with specific logger type: \'' . AbstractLogger::TYPE_DB . '\'', AbstractLogger::TYPE_DB);
$logger->sendByLogger('Test with specific logger type: \'' . AbstractLogger::TYPE_EMAIL . '\'', AbstractLogger::TYPE_EMAIL);
exit(0);