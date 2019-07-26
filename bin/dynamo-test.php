#! /usr/bin/env php
<?php
/**
 * Created by SlimApp.
 *
 * Date: 2018-12-03
 * Time: 02:51
 */

use Vendor\DynamoTest\Commands\CommonTest;
use Vendor\DynamoTest\Commands\GlobalTableTest\InfiniteDataWriter;
use Vendor\DynamoTest\Commands\GlobalTableTest\ReaderCommand;
use Vendor\DynamoTest\Commands\GlobalTableTest\WriterCommand;
use Vendor\DynamoTest\DynamoTest;

/** @var DynamoTest $app */
$app = require_once __DIR__ . "/../bootstrap.php";

$consle = $app->getConsoleApplication();

$consle->addCommands(
    [
        new WriterCommand(),
        new ReaderCommand(),
        new InfiniteDataWriter(),
        new Oasis\SlimApp\SentinelCommand\DaemonSentinelCommand('sentinel:run'),
        new CommonTest()
    ]
);

$consle->run();

