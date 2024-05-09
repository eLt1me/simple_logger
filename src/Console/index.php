<?php

use App\Console\Application\AbstractLogger;
use App\Console\Infrastructure\ConcreteLogger;

require_once dirname(__DIR__) . '/../vendor/autoload.php';
defined('BASE_PATH') or define('BASE_PATH', dirname(__DIR__));
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
echo "\n\n-----Testing sendByLogger() method:\n";
$logger->sendByLogger('Test with specific logger type: \'' . AbstractLogger::TYPE_FILE . '\'', AbstractLogger::TYPE_FILE);
$logger->sendByLogger('Test with specific logger type: \'' . AbstractLogger::TYPE_DB . '\'', AbstractLogger::TYPE_DB);
$logger->sendByLogger('Test with specific logger type: \'' . AbstractLogger::TYPE_EMAIL . '\'', AbstractLogger::TYPE_EMAIL);
$logger->setMessage('New Message');

echo "\n\n-----Testing log() method:\n";
$logger->log();

echo "-----\nTesting logTo() method for " . AbstractLogger::TYPE_FILE . ":\n";
$logger->logTo(AbstractLogger::TYPE_FILE);

echo "-----\nLog To all:\n";
$logger->logToAll();

exit(0);