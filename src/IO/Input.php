<?php

namespace Henrik\Console\IO;

use Henrik\Console\Interfaces\InputInterface;

class Input implements InputInterface
{
    /**
     * @var array<string, scalar> $args
     */
    private array $args = [];

    /**
     * {@inheritDoc}
     */
    public function get(string $argumentName, null|bool|float|int|string $defaultValue = null): null|bool|float|int|string
    {
        if ($this->has($argumentName)) {
            return $this->args[$argumentName];
        }

        return $defaultValue;
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $argumentName): bool
    {
        return isset($this->args[$argumentName]);
    }

    /**
     * {@inheritDoc}
     */
    public function setArguments(array $arguments): void
    {
        $this->args = $arguments;
    }
}