<?php
declare(strict_types=1);

namespace App\Src\Exception;

use Psr\Container\NotFoundExceptionInterface;
use Exception;

class ServiceNotFoundException extends Exception implements NotFoundExceptionInterface
{
    //
}
