<?php

namespace Henrik\Console\SampleCommands;

use Henrik\Console\Attributes\AsCommand;
use Henrik\Console\Interfaces\CommandInterface;
use Henrik\Console\Interfaces\InputInterface;
use Henrik\Console\Interfaces\OutputInterface;
use Henrik\Console\Services\SampleService;

#[AsCommand('app:sample', 'The sample command')]
class SampleCommand implements CommandInterface
{
    public function __construct(private readonly SampleService $sampleService) {}

    public function start(InputInterface $input, OutputInterface $output): void
    {
        $this->sampleService->show();
    }
}