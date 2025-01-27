<?php
declare(strict_types=1);

namespace App;

require_once './vendor/autoload.php';

use App\Src\ConfigInterface;
Use App\Src\PHPConfig;
use App\Src\App;
use App\Src\Container;

$container = new Container();
$container->bind(ConfigInterface::class, PHPConfig::class);

$app = $container->resolveClass(App::class, [
    'arg1' => 'value1',
    'arg2' => 'value2'
]);

$value = $container->resolveMethod($app, 'handle', [
    'arg1' => 'value1',
    'arg2' => 'value2'
]);

/**
 * Test 1: App class with injected dependencies in constructor
 */

echo PHP_EOL;
print_r($app);
echo PHP_EOL;

/**
 * Test 2: App class after executing its method with injected dependencies
 */

echo PHP_EOL;
print_r($value);
echo PHP_EOL;