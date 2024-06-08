<?php

namespace Henrik\Console;

use Henrik\Contracts\Console\CommandDefinitionInterface;
use Henrik\Contracts\EventInterface;

class CommandEvent implements EventInterface
{
    private CommandDefinitionInterface $commandDefinition;

    /**
     * @param CommandDefinitionInterface $commandDefinition
     */
    public function __construct(CommandDefinitionInterface $commandDefinition)
    {
        $this->commandDefinition = $commandDefinition;
    }

    public function getCommandDefinition(): CommandDefinitionInterface
    {
        return $this->commandDefinition;
    }

    public function setCommandDefinition(CommandDefinitionInterface $commandDefinition): void
    {
        $this->commandDefinition = $commandDefinition;
    }
}