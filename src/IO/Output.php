<?php

namespace Henrik\Console\IO;

use Henrik\Console\Interfaces\OutputInterface;
use Henrik\Contracts\Console\CommandDefinitionInterface;

class Output implements OutputInterface
{
    /**
     * @param array<string, CommandDefinitionInterface> $commands
     *
     * @return void
     */
    public function prettyPrintCommands(array $commands): void
    {
        /** @var CommandDefinitionInterface $properties */
        foreach ($commands as $command => $properties) {
            echo sprintf("Command: %s\t Description: %s\t Handler: %s \n", $command, $properties->getDescription(), $properties->getClass());
        }
    }
}