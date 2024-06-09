<?php

namespace Henrik\Console;

use Henrik\Console\Interfaces\CommandRunnerInterface;
use Henrik\Console\Interfaces\InputInterface;
use Henrik\Console\Interfaces\OutputInterface;
use Henrik\Container\ContainerInterface;
use Henrik\Contracts\Console\CommandProcessorInterface;
use Henrik\Contracts\Console\CommandsContainerInterface;

readonly class CommandRunner implements CommandRunnerInterface
{
    public function __construct(
        private CommandProcessorInterface $commandProcessor,
        private CommandsContainerInterface $commandsContainer,
        private OutputInterface $output,
        private InputInterface $input
    ) {}

    /**
     * {@inheritDoc}
     */
    public function run(int $argc, array $argv): void
    {
        if ($argc < 2) {
            $this->printAvailableCommands();

            return;
        }
        array_shift($argv);
        /** @var string $command */
        $command = array_shift($argv);

        if (!empty($argv)) {
            $arguments = $this->parseArguments($argv);
            $this->input->setArguments($arguments);
        }

        $this->commandProcessor->process($command);
    }

    private function printAvailableCommands(): void
    {
        if ($this->commandsContainer instanceof ContainerInterface) {
            /** @var array<string, CommandDefinition> $commands */
            $commands = $this->commandsContainer->getAll();
            $this->output->prettyPrintCommands($commands);
        }
    }

    /**
     * @param array<string> $arguments
     *
     * @return array<scalar>
     */
    private function parseArguments(array $arguments): array
    {
        $parsedArguments = [];

        foreach ($arguments as $argument) {
            $argumentParts = explode('=', $argument, 2);

            if (count($argumentParts) > 1) {
                $parsedArguments = [$argumentParts[0] => $argumentParts[1]];
            }
        }

        return $parsedArguments;
    }
}