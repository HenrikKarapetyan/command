<?php

namespace Henrik\Console\Interfaces;

interface CommandInterface
{
    public function start(InputInterface $input, OutputInterface $output): void;
}