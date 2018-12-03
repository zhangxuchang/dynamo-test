<?php
/**
 * Created by SlimApp.
 *
 * Date: 2018-12-03
 * Time: 02:51
 */

use Vendor\DynamoTest\DynamoTest;
use Monolog\Logger;
use Oasis\Mlib\Logging\ConsoleHandler;
use Oasis\Mlib\Logging\MLogging;

/** @var DynamoTest $app */
$app = require __DIR__ . "/../bootstrap.php";
if (!$app->isDebug()) {
    die ("Never run unit test under production environment!");
}

(new ConsoleHandler())->install();
if (!in_array('-v', $_SERVER['argv'])
    && !in_array('--verbose', $_SERVER['argv'])
) {
    MLogging::setMinLogLevel(Logger::CRITICAL);
}





return $app;
