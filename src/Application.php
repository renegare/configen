<?php

namespace Renegare\Configen;

use Symfony\Component\Console\Application as ConsoleApplication;

class Application extends ConsoleApplication {
    /**
     * {@inheritdoc}
     */
    public function __construct($version = '%version%') {
        parent::__construct('Configen', $version);
    }
}
