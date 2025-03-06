<?php
declare(strict_types=1);

namespace App\CommandBus\Commands;

use App\CommandBus\Contracts\CommandInterface;

class EchoCommand implements CommandInterface
{
    public function __invoke()
    {
        echo "\nThis is a test\n\n";
    }
}