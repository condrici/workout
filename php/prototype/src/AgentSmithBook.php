<?php
declare(strict_types=1);

namespace App\src;

class AgentSmithBook extends BookAbstract
{
    protected string $title = "Agent Smith";

    public function __clone()
    {
    }
}