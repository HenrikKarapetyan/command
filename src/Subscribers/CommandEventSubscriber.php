<?php

namespace Henrik\Console\Subscribers;

use Henrik\Contracts\CoreEvents;
use Henrik\Contracts\EventInterface;
use Henrik\Contracts\EventSubscriberInterface;

class CommandEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            CoreEvents::COMMAND_MATCH_EVENTS => 'onCommandMatch',
        ];
    }

    public function onCommandMatch(EventInterface $event): void
    {
        var_dump('ok');
    }
}