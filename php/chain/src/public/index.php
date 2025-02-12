<?php
declare(strict_types=1);

require_once (__DIR__ . "/../vendor/autoload.php");

use App\Server;
use App\Middleware\UserExistsMiddleware;
use App\Middleware\ThrottlingMiddleware;
use App\Middleware\RoleCheckMiddleware;

$server = new Server();

$middleware = new UserExistsMiddleware($server);

$middleware
    ->linkWith(new ThrottlingMiddleware(1))
    ->linkWith(new RoleCheckMiddleware());

$server->setMiddleware($middleware);

$server->register('user@example.com', 'q123!£weq1');
$server->login('user@example.com', 'q123!£weq1');