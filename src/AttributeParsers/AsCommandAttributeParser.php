<?php

namespace Hk\Command\ConsoleComponent\AttributeParsers;

use Hk\Command\ConsoleComponent\Attrributes\AsCommand;
use Hk\Command\ConsoleComponent\CommandDefinition;
use Hk\Command\ConsoleComponent\CommandsContainer;
use Hk\Contracts\AttributeParser\AttributeParserInterface;
use ReflectionClass;

readonly class AsCommandAttributeParser implements AttributeParserInterface
{
    public function __construct(private CommandsContainer $commandsContainer) {}

    public function parse(?object $attributeClass, ReflectionClass $reflectionClass): void
    {
        if ($attributeClass) {
            /** @var AsCommand $asCommandAttribute */
            $asCommandAttribute = $attributeClass;

            $definition = new CommandDefinition($asCommandAttribute->name, $asCommandAttribute->description);
            $this->commandsContainer->set($asCommandAttribute->name, $definition);

        }
    }
}