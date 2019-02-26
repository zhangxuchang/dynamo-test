<?php
/**
 * Created by PhpStorm.
 * User: xuchang
 * Date: 2018/12/10
 * Time: 10:22
 */

namespace Vendor\DynamoTest\Commands\GlobalTableTest;

use Oasis\Mlib\ODM\Dynamodb\ItemManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Vendor\DynamoTest\DynamoTest;
use Vendor\DynamoTest\Items\User;

/**
 * Class InfiniteDataWriter
 *
 * @package Vendor\DynamoTest\Commands\GlobalTableTest
 */
class InfiniteDataWriter extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName("global:talbe:infinite:wirter");
        $this->setDescription('Put item into dynamo table infinitly');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ItemManager $it */
        $it = DynamoTest::app()->getService("item_manager");

        $beginSeed = time();
        $uIdx      = 0;
        $threshold = 30; // (seconds)

        $output->writeln("Begin to put data into dynamo table:");

        while (true) {

            // set a threshold
            if ((time() - $beginSeed) > $threshold) {
                $it->flush();
                $output->writeln('');
                $output->writeln("Auto stoped after {$threshold} seconds!");
                $output->writeln("current index: {$uIdx}");
                break;
            }

            $uIdx++;

            $user = new User();
            $user->setUuid("uuid-{$beginSeed}-{$uIdx}");
            $user->setName("uname-{$beginSeed}-{$uIdx}");
            $user->setAddress('');
            $it->persist($user);

            $output->write('.');

            if ($uIdx % 100 == 0) {
                $it->flush();
                $it->clear();
            }
        }
    }
}
