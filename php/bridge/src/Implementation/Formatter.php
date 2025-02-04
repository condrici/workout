<?php
declare(strict_types=1);

namespace App\src\Implementation;

interface Formatter
{
    public function format (string $text): string;
}