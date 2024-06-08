<?php

namespace Henrik\Console;

use Henrik\Console\AttributeParsers\AsCommandAttributeParser;
use Henrik\Console\Attributes\AsCommand;
use Henrik\Contracts\BaseComponent;
use Henrik\Contracts\ComponentInterfaces\AttributesAndParsersAwareInterface;
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