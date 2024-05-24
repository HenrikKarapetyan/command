<?php

namespace Henrik\Command;

use Henrik\Command\AttributeParsers\AsCommandAttributeParser;
use Henrik\Command\Attributes\AsCommand;
use Henrik\Contracts\BaseComponent;
use Henrik\Contracts\Command\CommandsContainerInterface;
use Henrik\Contracts\Enums\ServiceScope;

class ConsoleComponent extends BaseComponent
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