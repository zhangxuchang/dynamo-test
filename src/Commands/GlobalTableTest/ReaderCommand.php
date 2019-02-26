<?php
/**
 * Created by PhpStorm.
 * User: xuchang
 * Date: 2018/12/3
 * Time: 11:19
 */

namespace Vendor\DynamoTest\Commands\GlobalTableTest;

use Oasis\Mlib\ODM\Dynamodb\ItemManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Vendor\DynamoTest\DynamoTest;
use Vendor\DynamoTest\Items\User;

/**
 * Class ReaderCommand
 *
 * @package Vendor\DynamoTest\Commands\GlobalTableTest
 */
class ReaderCommand extends Command
{
    use DataTrait;

    protected function configure()
    {
        parent::configure();
        $this->setName("global:talbe:test:reader");
        $this->setDescription('Dynamo table global table test action data reader command');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;

        $userList = $this->getDataConfig('users');

        /** @var ItemManager $it */
        $it = DynamoTest::app()->getService("item_manager");

        $userQuery = function ($uuid) use ($it) {
            /** @var User $user */
            $user = $it->getRepository(User::class)->get(['uuid' => $uuid]);

            return $user;
        };

        foreach ($userList as $item) {

            do {
                $user = $userQuery($item['uuid']);

                if ($user !== null) {
                    $this->recordTime("get-{$item['uuid']}");
                }
                else {
                    $output->write('.');
                }

            } while ($user == null);
        }
    }
}
