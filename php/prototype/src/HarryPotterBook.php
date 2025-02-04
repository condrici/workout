<?php
declare(strict_types=1);

namespace App\src;

class HarryPotterBook extends BookAbstract
{
    protected string $title = "Harry Potter";

    public function __clone()
    {
    }
}