<?php

namespace Henrik\Console\AttributeParsers;

use Henrik\Console\Attributes\AsCommand;
use Henrik\Console\CommandDefinition;
use Henrik\Console\CommandsContainer;
use Henrik\Contracts\AttributeParser\AttributeParserInterface;
use ReflectionClass;

readonly class AsCommandAttributeParser implements AttributeParserInterface
{
    public function __construct(private CommandsContainer $commandsContainer) {}

    public function parse(?object $attributeClass, ReflectionClass $reflectionClass): void
    {
        if ($attributeClass) {
            /** @var AsCommand $asCommandAttribute */
            $asCommandAttribute = $attributeClass;

            $definition = new CommandDefinition($reflectionClass->getName(), $asCommandAttribute->description);
            $this->commandsContainer->set($asCommandAttribute->name, $definition);

        }
    }
}