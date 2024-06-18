<?php

namespace Henrik\Console;

use Henrik\Console\Console\Colors\Color;
use Henrik\Console\Console\ConsoleOutputTextFormatter;
use Henrik\Console\Interfaces\CommandHelperInterface;
use Henrik\Contracts\Console\CommandDefinitionInterface;

class CommandHelper implements CommandHelperInterface
{
    /**
     *{@inheritDoc}
     */
    public function prettyPrintCommands(array $commands): void
    {
        $consoleOutputTextFormatter = new ConsoleOutputTextFormatter();

        /** @var CommandDefinitionInterface $properties */
        foreach ($commands as $command => $properties) {
            $consoleOutputTextFormatter
                ->addRegularText('Command:')
                ->addColorizedText($command, Color::GREEN)
                ->addTab()

                ->addRegularText('Description:')
                ->addColorizedText((string) $properties->getDescription(), Color::GREEN)
                ->addTab()

                ->addRegularText('Handler:')
                ->addColorizedText((string) $properties->getClass(), Color::CYAN)
                ->addNewLine();
        }
        echo $consoleOutputTextFormatter->getLine();
    }
}