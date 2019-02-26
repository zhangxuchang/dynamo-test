<?php
/**
 * Created by PhpStorm.
 * User: xuchang
 * Date: 2018/11/7
 * Time: 19:05
 */

namespace Vendor\DynamoTest\Commands\GlobalTableTest;

use Doctrine\DBAL\DriverManager;
use Oasis\Mlib\Utils\Exceptions\DataValidationException;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;

trait DataTrait
{
    private $startTime = 0;

    /**
     * @var OutputInterface
     */
    private $output;

    public function getDataConfig($key = null)
    {
        $file = __DIR__ . '/source.yml';

        if (!file_exists($file)) {
            throw new DataValidationException("File not found: {$file}");
        }

        $content = Yaml::parse(file_get_contents($file));

        if (!is_array($content)) {
            throw new DataValidationException("Invalid data in source file");
        }

        if (!empty($key)) {

            if (!key_exists($key, $content)) {
                return [];
            }
            else {
                return $content[$key];
            }
        }

        return $content;

    }

    protected function output($msg)
    {
        $this->output->writeln($msg);
    }

    protected function markStartTime()
    {
        $this->startTime = microtime(true);
    }

    protected function printExcuteTime($methodName)
    {
        $finishTime = microtime(true);
        $retTime    = $finishTime - $this->startTime;
        $logTxt     = "[$methodName]:span={$retTime}s";

        $this->output($logTxt);
        minfo($logTxt);
    }

    protected function recordTime($tag)
    {
        $t   = microtime(true);
        $txt = "[$tag] t={$t}";
        
        $this->output->writeln("");
        $this->output->writeln($txt);

        minfo($txt);
    }
}
