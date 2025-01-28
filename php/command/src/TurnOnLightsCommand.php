<?php
declare(strict_types=1);

namespace App\Src;

class TurnOnLightsCommand implements Command
{
    public function __construct(public LightReceiver $receiver)
    {
    }

    public function execute()
    {
        $this->receiver->turnOn();
    }
    public function undo()
    {
        $this->receiver->turnOff();
    }

}