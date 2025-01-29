<?php
declare(strict_types=1);

namespace App\Src;

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