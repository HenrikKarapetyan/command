<?php

namespace Henrik\Console\Interfaces;

interface CommandInterface
{
    public function run(InputInterface $input, OutputInterface $output): void;
}