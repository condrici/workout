<?php
declare(strict_types=1);

require_once (__DIR__ . "/../vendor/autoload.php");

use App\Models\Value\ProductSummaryValue;
use App\Models\Domain\Product;
use App\Models\DTO\ProductSummaryDTO;

/**
 * Entity
 */
$product = new Product(1, 'Some Book', 100, 'EUR', 1);

/**
 * ValueObject
 */

$productSummary1 = new ProductSummaryValue(
    $product->getName(), $product->getPrice(), $product->getCurrency(), $product->getQuantity()
);
$productSummary2 = new ProductSummaryValue(
    $product->getName(), $product->getPrice(), $product->getCurrency(), $product->getQuantity()
);

var_dump($productSummary1->isEqual($productSummary2));

/**
 * DTO
 */

$productSummaryDTO = new ProductSummaryDTO('Some Name', 100, "EUR", 1);