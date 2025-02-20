<?php

namespace App\Validation\Promotion;

use App\Interfaces\PromotionConfigValidator;
use Illuminate\Validation\Validator;

class FixedDiscountValidator implements PromotionConfigValidator
{
    public function validate(array $config, Validator $validator): void
    {
        if (!isset($config['discount_amount']) || !is_numeric($config['discount_amount'])) {
            $validator->errors()->add('config.discount_amount', 'O desconto deve ser um número.');
        }
    }
}
