<?php

namespace Henrik\Console;

use Henrik\Console\Exceptions\CommandNotFoundException;
use Henrik\Contracts\Console\CommandDefinitionInterface;
use Henrik\Contracts\Console\CommandProcessorInterface;
use Henrik\Contracts\Console\CommandsContainerInterface;
use Henrik\Contracts\CoreEvents;
use Henrik\Contracts\EventDispatcherInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CommandProcessor implements CommandProcessorInterface
{
    public function __construct(
        private readonly EventDispatcherInterface $commandEventDispatcher,
        private readonly CommandsContainerInterface $commandsContainer
    ) {}

    /**
     * {@inheritDoc}
     *
     * @param string                $command
     * @param array<string, scalar> $args
     *
     * @throws CommandNotFoundException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function process(string $command, array $args): void
    {
        if (!$this->commandsContainer->has($command)) {
            throw new CommandNotFoundException($command);
        }

        /** @var CommandDefinitionInterface $commandDefinition */
        $commandDefinition = $this->commandsContainer->get($command);
        $this->commandEventDispatcher->dispatch(
            new CommandEvent($commandDefinition, $args),
            CoreEvents::COMMAND_MATCH_EVENTS
        );
    }
}