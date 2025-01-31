<?php
declare(strict_types=1);

namespace App\Src\Strategy\Factory;

use App\src\Strategy\Strategy;

interface StrategyFactory
{
    public function createByAction(string $action): Strategy;
}