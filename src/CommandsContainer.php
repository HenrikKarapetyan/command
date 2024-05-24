<?php

namespace Henrik\Command;

use Henrik\Container\Container;
use Henrik\Container\ContainerModes;
use Henrik\Contracts\Command\CommandsContainerInterface;

class CommandsContainer extends Container implements CommandsContainerInterface
{
    public function __construct()
    {
        $this->changeMode(ContainerModes::SINGLE_VALUE_MODE);
    }
}