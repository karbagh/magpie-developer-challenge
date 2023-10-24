<?php

namespace App\Enums\Product;

enum ProductAvailabilityEnum: string
{
    case AVAILABLE = 'In Stock';
    case UNAVAILABLE = 'Out of Stock';

    public function isAvailable(): bool
    {
        return match ($this) {
            self::AVAILABLE => true,
            default => false,
        };
    }
}
