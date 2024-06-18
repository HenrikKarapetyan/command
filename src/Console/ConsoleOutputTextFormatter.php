<?php

namespace Henrik\Console\Console;

use Henrik\Console\Console\Colors\BackgroundColor;
use Henrik\Console\Console\Colors\Color;

class ConsoleOutputTextFormatter
{
    /** @var string[] */
    private array $lineParts = [];

    public function addRegularText(string $text): self
    {
        $this->lineParts[] = $text;

        return $this;
    }

    public function addColorizedText(string $line, Color $color = Color::BLACK, BackgroundColor $backgroundColor = BackgroundColor::TRANSPARENT): self
    {
        $this->lineParts[] = sprintf("\e[%s;%dm%s\e[0m", $color->toString(), $backgroundColor->toInt(), $line);

        return $this;
    }

    public function getLine(): string
    {
        return implode('', $this->lineParts);
    }

    public function addNewLine(): self
    {
        $this->lineParts[] = "\n";

        return $this;
    }

    public function addTab(): self
    {
        $this->lineParts[] = "\t";

        return $this;
    }
}