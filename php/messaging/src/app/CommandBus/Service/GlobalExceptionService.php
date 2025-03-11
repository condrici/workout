<?php
declare(strict_types=1);

namespace App\CommandBus\Service;

class GlobalExceptionService
{
    protected const CAPTURE_ERROR_LEVEL = E_ALL;

    public function handleExceptions(): void
    {
        set_exception_handler(array($this, 'catchUnhandledExceptions'));
    }

    public function handleErrors(): void
    {
        set_error_handler(array($this, 'catchUnhandledErrors'));
    }

    public function handleShutdown(): void
    {
        register_shutdown_function(array($this, 'catchScriptShutdown'));
    }

    public function catchUnhandledExceptions(): void
    {
        echo "Global exception handler here, please change my functionality";
    }

    public function catchUnhandledErrors(): void
    {
        echo "Global error handler here, please change my functionality";
    }

    public function catchScriptShutdown(): void
    {
        echo "Global fatal error handler here, please change my functionality";
    }
}