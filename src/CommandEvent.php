<?php

namespace Henrik\Console;

use Henrik\Contracts\Console\CommandDefinitionInterface;
use Henrik\Contracts\EventInterface;

class CommandEvent implements EventInterface
{
    private CommandDefinitionInterface $commandDefinition;
    /** @var array<string, scalar> */
    private array $args;

    /**
     * @param CommandDefinitionInterface $commandDefinition
     * @param array<string, scalar>      $args
     */
    public function __construct(CommandDefinitionInterface $commandDefinition, array $args)
    {
        $this->commandDefinition = $commandDefinition;
        $this->args              = $args;
    }

    public function getCommandDefinition(): CommandDefinitionInterface
    {
        return $this->commandDefinition;
    }

    public function setCommandDefinition(CommandDefinitionInterface $commandDefinition): void
    {
        $this->commandDefinition = $commandDefinition;
    }

    /**
     * @return array<string, scalar>
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * @param array<string, scalar> $args
     *
     * @return void
     */
    public function setArgs(array $args): void
    {
        $this->args = $args;
    }
}