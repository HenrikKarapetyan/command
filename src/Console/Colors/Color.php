<?php

namespace Henrik\Console\Console\Colors;

enum Color: string
{
    public function toString(): string
    {
        return $this->value;
    }
    case BLACK         = '0;30';
    case WHITE         = '1;37';
    case DARK_GREY     = '1;30';
    case RED           = '0;31';
    case GREEN         = '0;32';
    case BROWN         = '0;33';
    case YELLOW        = '1;33';
    case BLUE          = '0;34';
    case MAGENTA       = '0;35';
    case CYAN          = '0;36';
    case LIGHT_CYAN    = '1;36';
    case LIGHT_GREY    = '0;37';
    case LIGHT_RED     = '1;31';
    case LIGHT_GREEN   = '1;32';
    case LIGHT_BLUE    = '1;34';
    case LIGHT_MAGENTA = '1;35';
}
