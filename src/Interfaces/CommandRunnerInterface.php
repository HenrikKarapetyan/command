<?php

namespace Henrik\Console\Interfaces;

interface CommandRunnerInterface
{
    public function run(int $argc, array $argv): void;
}