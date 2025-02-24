<?php

namespace App\Validation\Promotion;

use App\Interfaces\PromotionConfigValidator;
use App\Models\Product;
use Illuminate\Validation\Validator;

class PercentageDiscountPromotionValidator implements PromotionConfigValidator
{
    public function validate(array $config, Validator $validator): void
    {
        if (!isset($config['discount_percentage']) || !is_numeric($config['discount_percentage'])) {
            $validator->errors()->add('config.discount_percentage', 'O desconto deve ser um número.');
        }

        if (($config['discount_percentage'] > 100  || $config['discount_percentage'] < 1)) {
            $validator->errors()->add('config.discount_percentage', 'O desconto deve ser um número entre 1 e 100.');
        }

        if (!isset($config['product_id']) || !Product::whereId($config['product_id'])->first()) {
            $validator->errors()->add('config.discount_amount', 'O produto escolhido não existe na base de dados');
        }
    }
}
