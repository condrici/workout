<?php
declare(strict_types=1);

namespace App\Src;

use App\src\Implementation\Formatter;

abstract class Service
{
    public function __construct(protected Formatter $implementation)
    {
    }

    public function setImplementation(Formatter $formatter): void
    {
        $this->implementation = $formatter;
    }

    abstract function get(): string;
}