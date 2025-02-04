<?php
declare(strict_types=1);

namespace App\Src;

use InvalidArgumentException;

class StaticFactory
{
    public static function create(string $type): Formatter
    {
        return match ($type) {
            'number' => new FormatNumber(),
            'string' => new FormatString(),
            default  => throw new InvalidArgumentException('Unknown format given')
        };
    }
}