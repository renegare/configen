<?php

namespace Renegare\Configen\Test;

class CliTest extends BaseTestCase {

    public function test_cli_displays_its_name() {
        $tester = $this->getApplicationTester();
        $tester->run([]);
        $this->assertRegexp('/Configen/', $tester->getDisplay());
    }
}
