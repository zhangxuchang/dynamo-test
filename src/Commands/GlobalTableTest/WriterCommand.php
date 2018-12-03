<?php
/**
 * Created by PhpStorm.
 * User: xuchang
 * Date: 2018/12/3
 * Time: 11:15
 */

namespace Vendor\DynamoTest\Commands\GlobalTableTest;

use Oasis\Mlib\AwsWrappers\Test\DynamoDbItemTest;
use Oasis\Mlib\ODM\Dynamodb\ItemManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Vendor\DynamoTest\DynamoTest;
use Vendor\DynamoTest\Items\User;

/**
 * Class WriterCommand
 *
 * @package Vendor\DynamoTest\Commands\GlobalTableTest
 */
class WriterCommand extends Command
{
    use DataTrait;

    protected function configure()
    {
        parent::configure();
        $this->setName("global:talbe:test:wirter");
        $this->setDescription('Dynamo table global table test action data writer command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
        
        $userList = $this->getDataConfig('users');

        /** @var ItemManager $it */
        $it = DynamoTest::app()->getService("item_manager");

        // Put item to Dynamo table one by one
        foreach ($userList as $item) {

            $this->markStartTime();

            $user = new User();
            $user->setUuid($item['uuid']);
            $user->setName($item['name']);
            $user->setAddress($item['address']);
            $it->persist($user);
            $it->flush();

            $this->recordTime("put-{$item['uuid']}");
        }

    }
}
