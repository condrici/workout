<?php
declare(strict_types=1);

namespace App\src;

readonly class Item
{
    public function __construct(private float $price)
    {
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}