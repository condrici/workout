<?php
declare(strict_types=1);

namespace App;

require_once ("vendor/autoload.php");

use App\src\Builder\CarBuilder;
use App\Src\Director;

$director = new Director();
$vehicle = $director->build(new CarBuilder());
print_r($vehicle);