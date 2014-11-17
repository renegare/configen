<?php

namespace Renegare\Configen\Test;

use Symfony\Component\Console\Tester\ApplicationTester;
use Renegare\Configen\Application;

class BaseTestCase extends \PHPUnit_Framework_TestCase {

    /** @var Application */
    private $app;

    /**
     * @return ApplicationTester
     */
    public function getApplicationTester() {
        return new ApplicationTester($this->getApplication());
    }

    public function getApplication() {
        if(!$this->app) {
            $this->app = new Application;
            $this->app->setAutoExit(false);
        }

        return $this->app;
    }
}
