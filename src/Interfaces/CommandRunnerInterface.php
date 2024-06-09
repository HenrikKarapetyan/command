<?php

namespace Henrik\Console\Interfaces;

interface CommandRunnerInterface
{
    /**
     * @param int      $argc
     * @param string[] $argv
     *
     * @return void
     */
    public function run(int $argc, array $argv): void;
}