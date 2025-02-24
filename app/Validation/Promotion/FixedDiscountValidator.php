<?php

namespace App\Validation\Promotion;

use App\Interfaces\PromotionConfigValidator;
use App\Models\Product;
use Illuminate\Validation\Validator;

class FixedDiscountValidator implements PromotionConfigValidator
{
    public function validate(array $config, Validator $validator): void
    {
        // valida��o pra verificar se existe um discount_amount
        if (!isset($config['discount_amount']) || !is_numeric($config['discount_amount'])) {
            $validator->errors()->add('config.discount_amount', 'O desconto deve ser um n�mero.');
        }

        if (!isset($config['product_id']) || !Product::whereId($config['product_id'])->first()) {
            $validator->errors()->add('config.discount_amount', 'O produto escolhido n�o existe na base de dados');
        }
    }
}
