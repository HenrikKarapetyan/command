<?php

namespace Henrik\Console\IO;

use Henrik\Console\Console\Colors\Color;
use Henrik\Console\Console\ConsoleOutputTextFormatter;

class Prompt
{
    public function __construct(private readonly string $promptLine = '') {}

    public function asBool(): bool
    {
        $this->writePromptText(function (ConsoleOutputTextFormatter $formatter) {
            $formatter->addColorizedText('[Yes/No]', Color::GREEN)
                ->addRegularText('(Default: ')
                ->addColorizedText('Yes)', Color::GREEN);
        });
        $value = $this->getValueFromConsole();

        if (!$value) {
            return true;
        }

        if (ucfirst($value) === 'Yes' || ucfirst($value) === 'Y') {
            return true;
        }

        return false;
    }

    public function asInt(): int
    {
        $this->writePromptText();
        $value = $this->getValueFromConsole();

        if (is_numeric($value)) {
            return (int) $value;
        }

        return 0;
    }

    public function asFloat(): float
    {
        $this->writePromptText();
        $value = $this->getValueFromConsole();

        if (is_numeric($value)) {
            return (float) $value;
        }

        return 0.0;
    }

    public function asString(): string
    {
        $this->writePromptText();

        return (string) $this->getValueFromConsole();
    }

    /**
     * @param array<int|string, string> $choicesMap
     *
     * @return string|null
     */
    public function asChoice(array $choicesMap): ?string
    {
        $this->writePromptText(function (ConsoleOutputTextFormatter $formatter) use ($choicesMap) {
            foreach ($choicesMap as $index => $choice) {
                $formatter->addNewLine()
                    ->addColorizedText((string) $index, Color::GREEN)
                    ->addTab()
                    ->addColorizedText($choice, Color::CYAN);
            }
            $formatter->addNewLine();
        });
        $value = $this->getValueFromConsole();

        if ($value && isset($choicesMap[$value])) {
            return $choicesMap[$value];
        }

        return null;
    }

    private function writePromptText(?callable $callback = null): void
    {
        $consoleOutputTextFormatter = new ConsoleOutputTextFormatter();
        $consoleOutputTextFormatter->addRegularText($this->promptLine);

        if ($callback) {
            $callback($consoleOutputTextFormatter);
        }
        echo $consoleOutputTextFormatter->getLine();
    }

    private function getValueFromConsole(): false|string
    {
        return readline();
    }
}