<?php

namespace Henrik\Console;

use Henrik\Console\AttributeParsers\AsCommandAttributeParser;
use Henrik\Console\Attributes\AsCommand;
use Henrik\Console\Interfaces\CommandRunnerInterface;
use Henrik\Console\Interfaces\InputInterface;
use Henrik\Console\Interfaces\OutputInterface;
use Henrik\Console\IO\Input;
use Henrik\Console\IO\Output;
use Henrik\Console\Subscribers\CommandEventSubscriber;
use Henrik\Contracts\BaseComponent;
use Henrik\Contracts\ComponentInterfaces\AttributesAndParsersAwareInterface;
use Henrik\Contracts\Console\CommandProcessorInterface;
use Henrik\Contracts\Console\CommandsContainerInterface;
use Henrik\Contracts\Enums\ServiceScope;

class ConsoleComponent extends BaseComponent implements AttributesAndParsersAwareInterface
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
            ],
        ];
    }

    public function getAttributesAndParsers(): array
    {
        return [
            AsCommand::class => AsCommandAttributeParser::class,
        ];
    }
}