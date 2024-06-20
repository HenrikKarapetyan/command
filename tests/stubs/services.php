<?php

use Henrik\Console\CommandProcessor;
use Henrik\Console\CommandRunner;
use Henrik\Console\CommandsContainer;
use Henrik\Console\Interfaces\CommandRunnerInterface;
use Henrik\Console\Interfaces\InputInterface;
use Henrik\Console\Interfaces\OutputInterface;
use Henrik\Console\IO\Input;
use Henrik\Console\IO\Output;
use Henrik\Console\Subscribers\CommandEventSubscriber;
use Henrik\Console\Tests\Services\SampleService;
use Henrik\Contracts\Console\CommandProcessorInterface;
use Henrik\Contracts\Console\CommandsContainerInterface;
use Henrik\Contracts\Enums\ServiceScope;
use Henrik\Contracts\EventDispatcherInterface;
use Henrik\Contracts\MethodInvokerInterface;
use Henrik\DI\Utils\MethodInvoker;
use Henrik\Events\EventDispatcher;

return [

    ServiceScope::SINGLETON->value => [
        [
            'id'    => CommandsContainerInterface::class,
            'class' => CommandsContainer::class,
        ],

        [
            'id'    => EventDispatcherInterface::class,
            'class' => EventDispatcher::class,
        ],
        [
            'id'    => CommandProcessorInterface::class,
            'class' => CommandProcessor::class,
        ],
        [
            'id'    => CommandRunnerInterface::class,
            'class' => CommandRunner::class,
        ],
        [
            'id'    => InputInterface::class,
            'class' => Input::class,
        ],
        [
            'id'    => OutputInterface::class,
            'class' => Output::class,
        ],
        [
            'id'    => CommandEventSubscriber::class,
            'class' => CommandEventSubscriber::class,
        ],
        [
            'id'    => MethodInvokerInterface::class,
            'class' => MethodInvoker::class,
        ],
        [
            'id'    => SampleService::class,
            'class' => SampleService::class,
        ],
    ],

];