<?php
/**
 * Created by SlimApp.
 *
 * Date: 2018-12-03
 * Time: 02:51
 */


use Vendor\DynamoTest\DynamoTest;

/** @var DynamoTest $app */
$app = require_once __DIR__ . "/../bootstrap.php";

$app->getHttpKernel()->run();

