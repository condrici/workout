<?php
declare(strict_types=1);

namespace App\CommandBus\Contracts;

interface CommandInterface
{
    public function __invoke();
}