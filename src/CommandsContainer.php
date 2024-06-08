<?php

namespace Henrik\Console;

use Henrik\Container\Container;
use Henrik\Container\ContainerModes;
use Henrik\Container\Exceptions\UndefinedModeException;
use Henrik\Contracts\Console\CommandsContainerInterface;

class CommandsContainer extends Container implements CommandsContainerInterface
{
    /**
     * @throws UndefinedModeException
     */
    public function __construct()
    {
        $this->changeMode(ContainerModes::SINGLE_VALUE_MODE);
    }
}