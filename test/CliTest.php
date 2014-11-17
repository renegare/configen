<?php

namespace Renegare\Configen\Test;

class CliTest extends BaseTestCase {

    public function testSomething() {
        $tester = $this->getApplicationTester();
        $tester->run([]);
        $this->assertRegexp('/Configen/', $tester->getDisplay());
    }
}
