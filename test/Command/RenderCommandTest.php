<?php

namespace Renegare\Configen\Test;
use org\bovigo\vfs\vfsStream;

class RenderCommandTest extends BaseTestCase {

    public function test_command_is_registerd() {
        $tester = $this->getApplicationTester();
        $tester->run([]);
        $output = $tester->getDisplay();
        $this->assertRegexp('/render/', $output);
        $description = 'given a file (mustache template), variables will be replaced with environment variables';
        $this->assertContains($description, $output);
    }

    public function test_command_renders_mustache_files() {
        $vfs = vfsStream::setup('root');
        $configFile = sprintf('%s/test.yml', $vfs->url());
        $expectedEnvValue = time() . rand(0,100);
        $expectedInjectedValue = time() . rand(101,200);
        putenv('CONFIGEN_ENV=' . $expectedEnvValue);

        file_put_contents($configFile, <<<EOF
param: {{CONFIGEN_ENV}}
param2: {{CONFIGEN_INJECT}}
EOF
);

        $tester = $this->getCommandTester('render');
        $tester->execute([
            'file' => $configFile,
            '-e' => ['CONFIGEN_ENV', 'CONFIGEN_INJECT=' . $expectedInjectedValue]
        ]);

        $output = $tester->getDisplay();
        $this->assertEquals(<<<EOF
param: $expectedEnvValue
param2: $expectedInjectedValue

EOF
, $output);
        putenv('CONFIGEN_ENV');
    }
}
