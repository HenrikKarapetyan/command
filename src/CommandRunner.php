<?php

namespace Henrik\Console;

use Henrik\Console\Interfaces\CommandRunnerInterface;
use Henrik\Console\Interfaces\InputInterface;
use Henrik\Contracts\Console\CommandProcessorInterface;

readonly class CommandRunner implements CommandRunnerInterface
{
    public const DEFAULT_COMMAND = 'help';

    public function __construct(
        private CommandProcessorInterface $commandProcessor,
        private InputInterface $input
    ) {}

    /**
     * {@inheritDoc}
     */
    public function run(int $argc, array $argv): void
    {
        if ($argc < 2) {
            $this->commandProcessor->process(self::DEFAULT_COMMAND);

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