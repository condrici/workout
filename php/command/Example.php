<?php
declare(strict_types=1);

namespace App;

use App\Src\Invoker;
use App\Src\LightReceiver;
use App\Src\TurnOnLightsCommand;

require_once ("vendor/autoload.php");

$receiver = new LightReceiver();
$command  = new TurnOnLightsCommand($receiver);

$invoker = new Invoker();
$invoker->setCommand($command);
$invoker->run();

echo PHP_EOL;
print_r('Lights are: ' . $receiver->getLights());
echo PHP_EOL.PHP_EOL;

