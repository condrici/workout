<?php
declare(strict_types=1);

namespace App\Src;

use App\Src\Specification\PriceSpecification;

require_once ("vendor/autoload.php");

$item = new Item(9);
$specification = new PriceSpecification(1, 10);

var_dump($specification->isSatisfiedBy($item));

