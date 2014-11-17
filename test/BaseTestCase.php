<?php

namespace Renegare\Configen\Test;

use Symfony\Component\Console\Tester\ApplicationTester;
use Renegare\Configen\Application;
use Symfony\Component\Console\Tester\CommandTester;

class BaseTestCase extends \PHPUnit_Framework_TestCase {

    /** @var Application */
    private $app;

    /**
     * @return ApplicationTester
     */
    public function getApplicationTester() {
        return new ApplicationTester($this->getApplication());
    }

    /**
     * @return Application
     */
    public function getApplication() {
        if(!$this->app) {
            $this->app = new Application;
            $this->app->setAutoExit(false);
        }

        return $this->app;
    }

    /**
     * @param string $commandName
     * @return CommandTester
     */
    public function getCommandTester($commandName) {
        $command = $this->getCommand($commandName);
        return new CommandTester($command);
    }

    /**
     * @param string $commandName
     * @return Command
     */
    public function getCommand($name) {
        return $this->getApplication()->find($name);
    }
}
