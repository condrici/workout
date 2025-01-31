<?php
declare(strict_types=1);

namespace App\src\Strategy;

interface Strategy
{
    public function execute(int $a, int $b): int;
}