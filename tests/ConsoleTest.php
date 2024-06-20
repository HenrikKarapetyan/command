<?php

namespace Henrik\Console\Tests;

use Henrik\Console\BaseCommands\HelpCommand;
use Henrik\Console\CommandDefinition;
use Henrik\Console\CommandRunner;
use Henrik\Console\Interfaces\CommandRunnerInterface;
use Henrik\Console\Subscribers\CommandEventSubscriber;
use Henrik\Console\Tests\Commands\SampleCommand;
use Henrik\Contracts\Console\CommandsContainerInterface;
use Henrik\Contracts\DependencyInjectorInterface;
use Henrik\Contracts\EventDispatcherInterface;
use Henrik\DI\DependencyInjector;
use PHPUnit\Framework\TestCase;

class ConsoleTest extends TestCase
{
    private DependencyInjectorInterface $dependencyInjector;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dependencyInjector = DependencyInjector::instance();
        $services                 = require 'stubs/services.php';
        $this->dependencyInjector->load($services);
    }

    public function testCommandExecution(): void
    {
//        /** @var EventDispatcherInterface $eventDispatcher */
//        $eventDispatcher = $this->dependencyInjector->get(EventDispatcherInterface::class);
//
//        $eventDispatcher->addSubscriber($this->dependencyInjector->get(CommandEventSubscriber::class));
//
//        /** @var CommandsContainerInterface $commandsContainer */
//        $commandsContainer = $this->dependencyInjector->get(CommandsContainerInterface::class);
//
//        $commandsContainer->set('app:sample', new CommandDefinition(SampleCommand::class, 'The Sample Command'));
//        $commandsContainer->set(CommandRunner::DEFAULT_COMMAND, new CommandDefinition(HelpCommand::class, 'The Help Command'));
//
//        $commandRunner = $this->dependencyInjector->get(CommandRunnerInterface::class);
//       $res = $commandRunner->run(3, ['', 'app:sample', 'name=default']);

    }
}