<?php

namespace Henrik\Console\Interfaces;

use Henrik\Contracts\Console\CommandDefinitionInterface;

interface OutputInterface
{
    /**
     * @param array<string, CommandDefinitionInterface> $commands
     *
     * @return void
     */
    public function prettyPrintCommands(array $commands): void;
}