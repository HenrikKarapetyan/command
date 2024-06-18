<?php

namespace Henrik\Console\IO;

use Henrik\Console\Console\Colors\Color;
use Henrik\Console\Console\ConsoleOutputTextFormatter;
use Henrik\Console\Interfaces\OutputInterface;

class Output implements OutputInterface
{
    public function write(string $line, Color $color = Color::BLACK): void
    {
        $consoleOutputTextFormatter = new ConsoleOutputTextFormatter();
        $consoleOutputTextFormatter
            ->addColorizedText($line, $color)
            ->addNewLine();
        echo $consoleOutputTextFormatter->getLine();
    }

    public function danger(string $line): void
    {
        $this->write($line, Color::RED);
    }

    public function warning(string $line): void
    {
        $this->write($line, Color::YELLOW);
    }

    public function success(string $line): void
    {
        $this->write($line, Color::LIGHT_GREEN);
    }
}