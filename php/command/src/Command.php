<?php
declare(strict_types=1);

namespace App\Src;

interface Command
{
    public function execute();
}