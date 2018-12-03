<?php
/**
 * Created by SlimApp.
 *
 * Date: 2018-12-03
 * Time: 02:51
 */

namespace Vendor\DynamoTest\Database;


use Oasis\Mlib\ODM\Dynamodb\ItemManager;
use Oasis\Mlib\Utils\DataProviderInterface;
use Vendor\DynamoTest\DynamoTest;


class DynamoTestDatabase
{


    public static function getItemManager()
    {
        /** @var ItemManager $im */
        static $im = null;
        
        if ($im === null) {
            $app = DynamoTest::app();
            
            $cacheDir  = $app->getMandatoryConfig('dir.cache', DataProviderInterface::STRING_TYPE);
            $awsConfig = $app->getMandatoryConfig('aws', DataProviderInterface::ARRAY_TYPE);
            $prefix    = $app->getMandatoryConfig('dynamodb.prefix', DataProviderInterface::STRING_TYPE);
            
            $im = new ItemManager($awsConfig, $prefix, $cacheDir, $app->isDebug());
            $dir = PROJECT_DIR . "/src/Items";
            if (\is_dir($dir)) {
                $im->addNamespace("Vendor\\DynamoTest\\Items", $dir);
            }
        }
        
        return $im;
    }
}
