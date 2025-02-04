<?php
declare(strict_types=1);

namespace App\Src;

class PingService extends Service
{
    function get(): string
    {
        return $this->implementation->format("Pong");
    }

}