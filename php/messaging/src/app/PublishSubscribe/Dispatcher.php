<?php
declare(strict_types=1);

namespace App\PublishSubscribe;

use App\PublishSubscribe\Contracts\EventAbstract;
use App\PublishSubscribe\Contracts\ListenerInterface;

class Dispatcher
{
    /** Listeners List */
    private array $listeners = [];

    public function subscribe(
        ListenerInterface $listener,
        $resourceName = "*",
        $eventName = "*"
    ): Dispatcher
    {
        $this->listeners[$resourceName][$eventName][spl_object_hash($listener)] = $listener;
        return $this;
    }

    public function unscubscribe(
        ListenerInterface $listener,
        $resourceName = "*",
        $eventName = "*"
    ): Dispatcher
    {
        unset($this->listeners[$resourceName][$eventName][spl_object_hash($listener)]);
        return $this;
    }

    public function publish(EventAbstract $event)
    {
        $resourceName = $event->resourceName;
        $eventName = $event->eventName;

        //Loop through all the wildcard handlers
        if(isset($this->listeners['*']['*'])){
            foreach($this->listeners['*']['*'] as $listener){
                $listener->publish($event);
            }
        }

        //Dispatch wildcard Resources
        //These are events that are published no matter what the resource
        if(isset($this->listeners['*'])){
            foreach ($this->listeners['*'] as $currentEvent => $currentListeners) {
                if($currentEvent == $eventName){
                    foreach($currentListeners as $listener) {
                        $listener->publish($event);
                    }
                }
            }
        }

        //Dispatch wildcard Events
        //these are listeners that are dispatched for a certain resource, despite the event
        if(isset($this->listeners[$resourceName]['*'])){
            foreach($this->listeners[$resourceName]['*'] as $listener) {
                $listener->publish($event);
            }
        }

        //Dispatch to a certain resource event
        if(isset($this->listeners[$resourceName][$eventName])){
            foreach($this->listeners[$resourceName][$eventName] as $listener) {
                $listener->publish($event);
            }
        }

        return $this;

    }

    /**
     * Get all registered listeners
     */
    public function getListeners(): array
    {
        return $this->listeners;
    }
}