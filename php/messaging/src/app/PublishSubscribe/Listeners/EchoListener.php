<?php
declare(strict_types=1);

namespace App\PublishSubscribe\Listeners;

use App\PublishSubscribe\Contracts\ListenerInterface;
use App\PublishSubscribe\Contracts\EventAbstract;

class EchoListener implements ListenerInterface
{
    public function publish (EventAbstract $event)
    {
        echo sprintf(
            "%s published an %s\n",
            $event->resourceName,
            $event->eventName
        );
    }
}