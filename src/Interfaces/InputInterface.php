<?php

namespace Henrik\Console\Interfaces;

interface InputInterface
{
    /**
     * @param string                     $argumentName
     * @param bool|float|int|string|null $defaultValue
     *
     * @return bool|float|int|string|null
     */
    public function get(string $argumentName, null|bool|float|int|string $defaultValue = null): null|bool|float|int|string;

    /**
     * @param string $argumentName
     *
     * @return bool
     */
    public function has(string $argumentName): bool;

    /**
     * @param array<string, scalar> $arguments
     *
     * @return void
     */
    public function setArguments(array $arguments): void;
}