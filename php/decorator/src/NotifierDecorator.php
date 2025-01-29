<?php
declare(strict_types=1);

namespace App\src;

class NotifierDecorator implements NotifierInterface
{
    public function __construct(protected NotifierInterface $notifier)
    {
    }

    public function sendMessage(string $message): void
    {
        $extendFunctionality = '[this enclosed message was added by the decorator]';
        echo $message . ' ' . $extendFunctionality;
    }
}