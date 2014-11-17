<?php

namespace Renegare\Configen\Test;

class RenderCommandTest extends BaseTestCase {

    public function test_command_is_registerd() {
        $tester = $this->getApplicationTester();
        $tester->run([]);
        $output = $tester->getDisplay();
        $this->assertRegexp('/render/', $output);
        $description = 'given a file (mustache template), variables will be replaced with environment variables';
        $this->assertContains($description, $output);
    }
}
