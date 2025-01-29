<?php
declare(strict_types=1);

namespace App\src\Command;

interface Command
{
    public function execute(): void;
}