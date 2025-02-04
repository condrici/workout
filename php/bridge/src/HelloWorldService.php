<?php
declare(strict_types=1);

namespace App\Src;

class HelloWorldService extends Service
{
    function get(): string
    {
        return $this->implementation->format("Hello world");
    }

}