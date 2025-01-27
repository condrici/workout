<?php
declare(strict_types=1);

namespace App\Src\Exception;

use Exception;

use Psr\Container\NotFoundExceptionInterface;

class ServiceNotFoundException extends Exception implements NotFoundExceptionInterface
{
    //
}
