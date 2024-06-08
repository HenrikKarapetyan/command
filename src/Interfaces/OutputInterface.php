<?php

namespace Henrik\Console\Interfaces;

interface OutputInterface
{
    public function prettyPrintCommands(array $commands): void;
}