<?php
/**
 * Created by PhpStorm.
 * User: xuchang
 * Date: 2018/12/3
 * Time: 11:15
 */

namespace Vendor\DynamoTest\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class WriterCommand
 *
 * @package Vendor\DynamoTest\Commands\GlobalTableTest
 */
class CommonTest extends Command
{

    /**
     * @var OutputInterface
     */
    private $output;

    protected function configure()
    {

        parent::configure();
        $this->setName("common:test");
        $this->setDescription('common test command');
        $this->addArgument("author", InputArgument::OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $this->output = $output;

        $author = $input->getArgument("author");
        $this->testPrintARandomNumber($author);
    }

    protected function testPrintARandomNumber($author)
    {

        $num = mt_rand(0, 100);
        $msg = sprintf(
            "Got rand num %s at time: %s",
            $num,
            date("Y-m-d H:i:s", time())
        );

        if (!empty($author)) {
            $msg .= " and hello {$author}";
        }

        $this->output->writeln($msg);
        minfo($msg);
    }
}
