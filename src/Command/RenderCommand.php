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
            // ->addArgument('name', InputArgument::OPTIONAL, 'Who do you want to greet?')
            // ->addOption('yell', null, InputOption::VALUE_NONE, 'If set, the task will yell in uppercase letters')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }

}
