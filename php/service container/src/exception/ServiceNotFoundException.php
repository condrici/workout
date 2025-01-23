<?php

namespace App\Src\Exception;

use Psr\Container\NotFoundExceptionInterface;
use Exception;

class ServiceNotFoundException extends Exception implements NotFoundExceptionInterface
{
    //
}
