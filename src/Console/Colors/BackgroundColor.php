<?php

namespace Henrik\Console\Console\Colors;

enum BackgroundColor: int
{
    public function toInt(): int
    {
        return $this->value;
    }
    case BLACK       = 40;
    case RED         = 41;
    case GREEN       = 42;
    case YELLOW      = 43;
    case BLUE        = 44;
    case MAGENTA     = 45;
    case CYAN        = 46;
    case LIGHT_GREY  = 47;
    case TRANSPARENT = 1;
}