<?php
declare(strict_types=1);

namespace App;

require_once("vendor/autoload.php");

use App\Src\OrderContext;

/*
 * Test initial state
 */

echo PHP_EOL;
$context = new OrderContext();
print_r($context->toString());
echo PHP_EOL;

/*
 * Test second state
 */

echo PHP_EOL;
$context->proceedToNext();
print_r($context->toString());
echo PHP_EOL;echo PHP_EOL;