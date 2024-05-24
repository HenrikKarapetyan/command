<?php

namespace Hk\Command\ConsoleComponent;

use Hk\Command\ConsoleComponent\AttributeParsers\AsCommandAttributeParser;
use Hk\Command\ConsoleComponent\Attrributes\AsCommand;
use Hk\Contracts\BaseComponent;
use Hk\Contracts\CommandsContainerInterface;
use Hk\Contracts\Enums\ServiceScope;

class ConsoleComponent extends BaseComponent
{
    public function getServices(): array
    {
        return [
            ServiceScope::SINGLETON->value => [
                [CommandsContainerInterface::class => CommandsContainer::class],
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