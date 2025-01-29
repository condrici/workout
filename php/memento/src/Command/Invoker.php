<?php
declare(strict_types=1);

namespace App\src\Command;

class Invoker
{
    private Command $command;

    public function run(): void
    {
        $this->command->execute();
    }

    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }
}