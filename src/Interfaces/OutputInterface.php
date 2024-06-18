<?php

namespace Henrik\Console\Interfaces;

interface OutputInterface
{
    public function danger(string $line): void;

    public function warning(string $line): void;

    public function success(string $line): void;
}