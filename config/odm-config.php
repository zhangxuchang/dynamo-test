<?php
/**
 * Created by SlimApp.
 *
 * Date: 2018-12-03
 * Time: 02:51
 */
use Oasis\Mlib\ODM\Dynamodb\Console\ConsoleHelper;
use Vendor\DynamoTest\Database\DynamoTestDatabase;

require_once __DIR__ . '/../bootstrap.php';

$itemManager = DynamoTestDatabase::getItemManager();

return new ConsoleHelper($itemManager);

