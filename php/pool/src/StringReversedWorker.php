<?php
declare(strict_types=1);

namespace App\src;

class StringReversedWorker
{
    public function run(string $text): string
    {
        return strrev($text);
    }
}