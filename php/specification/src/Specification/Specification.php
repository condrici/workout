<?php
declare(strict_types=1);

namespace App\src\Specification;

use App\src\Item;

interface Specification
{
    public function isSatisfiedBy(Item $item): bool;
}