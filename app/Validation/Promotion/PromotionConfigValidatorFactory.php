<?php

namespace App\Validation\Promotion;

use App\Interfaces\PromotionConfigValidator;

class PromotionConfigValidatorFactory
{
    public static function make(int $promotionTypeId): ?PromotionConfigValidator
    {
        return match ($promotionTypeId) {
            2 => new FixedDiscountValidator(),
            3 => new PercentageDiscountPromotionValidator(),
            4 => new BuyXGetYPromotionValidator(),
            default => null,
        };
    }
}
