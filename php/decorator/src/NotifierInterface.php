<?php
declare(strict_types=1);

namespace App\src;

interface NotifierInterface
{
    public function sendMessage(string $message): void;
}