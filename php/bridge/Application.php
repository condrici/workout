<?php
declare(strict_types=1);

namespace App\Src;

require_once ("vendor/autoload.php");

use App\src\Implementation\PlainTextFormatter;

$formatter = new PlainTextFormatter();
$pingService = new PingService($formatter);

print_r($pingService->get());