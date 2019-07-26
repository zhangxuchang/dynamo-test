<?php
/**
 * Created by SlimApp.
 *
 * Date: 2018-12-03
 * Time: 02:51
 */

use Vendor\DynamoTest\DynamoTest;
use Vendor\DynamoTest\DynamoTestConfiguration;

require_once __DIR__ . "/vendor/autoload.php";

define('PROJECT_DIR', __DIR__);

date_default_timezone_set('Asia/Shanghai');

/** @var DynamoTest $app */
$app = DynamoTest::app();
$app->init(__DIR__ . "/config", new DynamoTestConfiguration(), __DIR__ . "/cache/config");

return $app;

