<?php
declare(strict_types=1);

namespace App\Models\Value;

use InvalidArgumentException;

/**
 * ValueObject
 * no unique identifier, self-validation, structural equality, immutability
 */
readonly class ProductSummaryValue
{
    public const CURRENCIES = [
        'EUR', 'USD'
    ];

    public function __construct(
        public string $name,
        public int    $price,
        public string $currency,
        public int    $quantity
    )
    {
        if (!in_array($this->currency, self::CURRENCIES)) {
            throw new InvalidArgumentException('Unknown currency');
        }
    }

    public function isEqual(ProductSummaryValue $productSummaryValue): bool
    {
        return $this->hash($this) === $this->hash($productSummaryValue);
    }

    private function hash(ProductSummaryValue $productSummaryValue): string
    {
        return md5("
            {$productSummaryValue->name}
            {$productSummaryValue->price}
            {$productSummaryValue->currency}
            {$productSummaryValue->quantity}"
        );
    }
}