<?php

namespace Henrik\Console;

use Henrik\Contracts\Console\CommandDefinitionInterface;

class CommandDefinition implements CommandDefinitionInterface
{
    public function __construct(
        private ?string $class = null,
        private ?string $description = null,
    ) {}

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}