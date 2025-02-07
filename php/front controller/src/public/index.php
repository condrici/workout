<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Entrypoint;

$routes = require __DIR__ . '/../config/routes.php';

$entrypoint = new Entrypoint($routes);
$entrypoint->handleRequest();
