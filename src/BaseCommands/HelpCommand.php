<?php

namespace Henrik\Console\BaseCommands;

use Henrik\Console\Attributes\AsCommand;
use Henrik\Console\CommandRunner;
use Henrik\Console\Console\Colors\Color;
use Henrik\Console\Console\ConsoleOutputTextFormatter;
use Henrik\Console\Interfaces\CommandInterface;
use Henrik\Console\Interfaces\InputInterface;
use Henrik\Console\Interfaces\OutputInterface;
use Henrik\Contracts\Console\CommandsContainerInterface;

#[AsCommand(CommandRunner::DEFAULT_COMMAND, 'The help command')]
final readonly class HelpCommand implements CommandInterface
{
    public function __construct(private CommandsContainerInterface $commandsContainer) {}

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return mixed
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function run(InputInterface $input, OutputInterface $output): mixed
    {
        $commands = $this->commandsContainer->getAll();

        $consoleOutputTextFormatter = new ConsoleOutputTextFormatter();

        $consoleOutputTextFormatter->addColorizedText('Usage: ', Color::LIGHT_CYAN)->addNewLine();

        $consoleOutputTextFormatter->addColorizedText('command', Color::BROWN)
            ->addTab()
            ->addColorizedText('[arguments]', Color::BLUE)->addNewLine()->addNewLine();

        $consoleOutputTextFormatter->addColorizedText('Available commands:', Color::LIGHT_CYAN)->addNewLine();

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

        return null;
    }
}