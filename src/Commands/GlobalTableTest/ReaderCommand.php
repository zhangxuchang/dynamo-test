<?php
/**
 * Created by PhpStorm.
 * User: xuchang
 * Date: 2018/12/3
 * Time: 11:19
 */

namespace Vendor\DynamoTest\Commands\GlobalTableTest;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ReaderCommand
 *
 * @package Vendor\DynamoTest\Commands\GlobalTableTest
 */
class ReaderCommand extends Command
{
    protected function configure()
    {
        parent::configure();
        $this->setName("global:talbe:test:reader");
        $this->setDescription('Dynamo table global table test action data reader command');
        $this->addArgument('appid', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}
