<?php
declare(strict_types=1);

namespace App;

require_once (__DIR__ . "/../vendor/autoload.php");

use App\Models\Product;

/**
 * Create first product
 * which will automatically get id=1
 */

$product = new Product();
$product->description = "this is a description";
$product->bar_code = 333;
$product->save();

/**
 * Find created product
 * by id=1
 */

var_dump($product::find(1));



