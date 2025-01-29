<?php
declare(strict_types=1);

namespace App;

use App\src\Notifier;
use App\src\NotifierDecorator;

require_once ("vendor/autoload.php");

$notifier = new Notifier();
$uniqueMessage = 'this is a message';
$notifierDecorator = new NotifierDecorator($notifier);

/**
 * Notifier
 */

echo PHP_EOL;
$notifier->sendMessage($uniqueMessage);
echo PHP_EOL;
echo PHP_EOL;

/**
 * Notifier Decorator
 */

$notifierDecorator->sendMessage($uniqueMessage);
echo PHP_EOL;
echo PHP_EOL;