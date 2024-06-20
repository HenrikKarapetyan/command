<?php

namespace Henrik\Console\Tests\Commands;

use Henrik\Console\Attributes\AsCommand;
use Henrik\Console\Interfaces\CommandInterface;
use Henrik\Console\Interfaces\InputInterface;
use Henrik\Console\Interfaces\OutputInterface;
use Henrik\Console\Tests\Services\SampleService;

#[AsCommand('app:sample', 'The sample command')]
readonly class SampleCommand implements CommandInterface
{
    public function __construct(private SampleService $sampleService) {}

    public function run(InputInterface $input, OutputInterface $output): mixed
    {
        $this->sampleService->show((string) $input->get('name', 'default'));

        $output->danger('As danger message!');
        $output->warning('As warning message!');
        $output->success('As success message!');

        return null;
    }
}