<?php

namespace Hk\Command\ConsoleComponent;

use Henrik\Container\Container;
use Henrik\Container\ContainerModes;
use Hk\Contracts\CommandsContainerInterface;

class CommandsContainer extends Container implements CommandsContainerInterface
{
    public function __construct()
    {
        $this->changeMode(ContainerModes::SINGLE_VALUE_MODE);
    }
}