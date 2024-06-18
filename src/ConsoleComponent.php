<?php

namespace Henrik\Console;

use Henrik\Console\AttributeParsers\AsCommandAttributeParser;
use Henrik\Console\Attributes\AsCommand;
use Henrik\Console\Interfaces\CommandHelperInterface;
use Henrik\Console\Interfaces\CommandRunnerInterface;
use Henrik\Console\Interfaces\InputInterface;
use Henrik\Console\Interfaces\OutputInterface;
use Henrik\Console\IO\Input;
use Henrik\Console\IO\Output;
use Henrik\Console\Subscribers\CommandEventSubscriber;
use Henrik\Contracts\BaseComponent;
use Henrik\Contracts\ComponentInterfaces\OnAttributesAndParsersAwareInterface;
use Henrik\Contracts\ComponentInterfaces\OnEventSubscriberAwareInterface;
use Henrik\Contracts\Console\CommandProcessorInterface;
use Henrik\Contracts\Console\CommandsContainerInterface;
use Henrik\Contracts\CoreEvents;
use Henrik\Contracts\Enums\ServiceScope;
use Henrik\Events\EventDispatcher;

class ConsoleComponent extends BaseComponent implements OnAttributesAndParsersAwareInterface, OnEventSubscriberAwareInterface
{
    public function getServices(): array
    {
        return [
            ServiceScope::SINGLETON->value => [
                [
                    'id'    => CommandsContainerInterface::class,
                    'class' => CommandsContainer::class,
                ],
                [
                    'id'    => CommandProcessorInterface::class,
                    'class' => CommandProcessor::class,
                ],
                [
                    'id'    => CommandRunnerInterface::class,
                    'class' => CommandRunner::class,
                ],
                [
                    'id'    => CommandHelperInterface::class,
                    'class' => CommandHelper::class,
                ],
                [
                    'id'    => InputInterface::class,
                    'class' => Input::class,
                ],
                [
                    'id'    => OutputInterface::class,
                    'class' => Output::class,
                ],
                [
                    'id'    => CommandEventSubscriber::class,
                    'class' => CommandEventSubscriber::class,
                ],
                [
                    'id'    => CoreEvents::COMMAND_DISPATCHER_DEFAULT_DEFINITION_ID,
                    'class' => EventDispatcher::class,
                ],
            ],
        ];
    }

    public function getAttributesAndParsers(): array
    {
        return [
            AsCommand::class => AsCommandAttributeParser::class,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getEventSubscribers(): array
    {
        return [
            CoreEvents::COMMAND_DISPATCHER_DEFAULT_DEFINITION_ID => [CommandEventSubscriber::class],
        ];
    }
}