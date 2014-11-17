<?php

namespace Renegare\Configen\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RenderCommand extends Command {

    protected function configure()
    {
        $this
            ->setName('render')
            ->setDescription('given a file (mustache template), variables will be replaced with environment variables')
            ->addArgument('file', InputArgument::REQUIRED, 'file path to render')
            ->addOption('env', '-e', InputOption::VALUE_IS_ARRAY | InputOption::VALUE_REQUIRED, 'expose environment variable to template')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');
        $exposedEnv = $input->getOption('env');

        $m = new \Mustache_Engine;
        $data = [];
        foreach($exposedEnv as $key) {
            $value = '';

            if(preg_match('/^([\w0-9_]+)=(.*)$/', $key, $matches)) {
                $key = $matches[1];
                $value = $matches[2];
            }

            if(!$value) {
                $value = getenv($key);
            }

            $data[$key] = $value;
        }
        $output->writeln($m->render(file_get_contents($file), $data));
    }

}
