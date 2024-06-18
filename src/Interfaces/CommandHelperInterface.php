<?php

namespace Henrik\Console\Interfaces;

use Henrik\Contracts\Console\CommandDefinitionInterface;

interface CommandHelperInterface
{
    /**
     * @param array<string, CommandDefinitionInterface> $commands
     *
     * @return void
     */
    public function prettyPrintCommands(array $commands): void;
}