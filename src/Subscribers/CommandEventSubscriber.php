<?php

namespace Henrik\Console\Subscribers;

use Henrik\Console\CommandEvent;
use Henrik\Console\Interfaces\CommandInterface;
use Henrik\Contracts\CoreEvents;
use Henrik\Contracts\DependencyInjectorInterface;
use Henrik\Contracts\EventInterface;
use Henrik\Contracts\EventSubscriberInterface;
use Henrik\Contracts\MethodInvokerInterface;
use Henrik\DI\Definition;

readonly class CommandEventSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private DependencyInjectorInterface $dependencyInjector,
        private MethodInvokerInterface $methodInvoker
    ) {}

    public static function getSubscribedEvents(): array
    {
        return [
            CoreEvents::COMMAND_MATCH_EVENTS => 'onCommandMatch',
        ];
    }

    /**
     * @param EventInterface $event
     *
     * @return mixed
     */
    public function onCommandMatch(EventInterface $event): mixed
    {
        if ($event instanceof CommandEvent) {
            $handlerClass = $event->getCommandDefinition()->getClass();

            $definition = new Definition($handlerClass, $handlerClass);

            /** @var CommandInterface $commandObject */
            $commandObject = $this->dependencyInjector->instantiate($definition);

            return $this->methodInvoker->invoke($commandObject, 'run');
        }

        return null;
    }
}