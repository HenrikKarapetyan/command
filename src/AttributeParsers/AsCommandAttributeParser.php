<?php

namespace Henrik\Console\AttributeParsers;

use Henrik\Console\Attributes\AsCommand;
use Henrik\Console\CommandDefinition;
use Henrik\Contracts\AttributeParser\AttributeParserInterface;
use Henrik\Contracts\Console\CommandsContainerInterface;
use ReflectionClass;

readonly class AsCommandAttributeParser implements AttributeParserInterface
{
    public function __construct(private CommandsContainerInterface $commandsContainer) {}

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