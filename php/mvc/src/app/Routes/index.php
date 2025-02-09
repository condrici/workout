<?php

use App\Controllers\HomeController;
use App\Core\Router;

$router = new Router();

/**
 * Routes
 * Routes that are currently accepted by the server
 */
$router->get('/', HomeController::class, 'index');

/**
 * Dispatch
 */

$router->dispatch();
