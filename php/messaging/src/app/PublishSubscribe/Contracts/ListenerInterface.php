<?php
declare(strict_types=1);

namespace App\PublishSubscribe\Contracts;

interface ListenerInterface
{
    public function publish (EventAbstract $event);
}