<?php
declare(strict_types=1);

namespace App\src;

class Notifier implements NotifierInterface
{
    public function sendMessage(string $message): void
    {
        echo $message;
    }
}