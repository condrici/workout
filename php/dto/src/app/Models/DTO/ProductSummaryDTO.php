<?php
declare(strict_types=1);

namespace App\Models\DTO;

/**
 * Example of a DTO starting with PHP 8.1
 * where readonly properties and/or classes can be used for immutability
 */
readonly class ProductSummaryDTO
{
    public function __construct(
        public string $name,
        public int    $price,
        public string $currency,
        public int    $quantity
    )
    {
    }
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'currency' => $this->currency,
            'quantity' => $this->quantity
        ];
    }

    /**
     * Different implementations
     *
     * Use methods instead of readonly public properties
     * price() instead of ->$price
     */
}