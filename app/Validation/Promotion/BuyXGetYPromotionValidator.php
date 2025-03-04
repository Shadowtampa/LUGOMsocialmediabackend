<?php

namespace App\Validation\Promotion;

use App\Interfaces\PromotionConfigValidator;
use App\Models\Product;
use Illuminate\Validation\Validator;

class BuyXGetYPromotionValidator implements PromotionConfigValidator
{
    public function validate(array $config, Validator $validator): void
    {
        // validação pra verificar se existe uma quantidade de produto x
        if (!isset($config['x_product_amount']) || !is_numeric($config['x_product_amount'])) {
            $validator->errors()->add('config.x_product_amount', 'O produto precisa ter uma quantidade.');
        }
        // validação pra verificar se o produto x existe
        if (!isset($config['x_product_id']) || !is_numeric($config['x_product_id'])) {
            $validator->errors()->add('config.x_product_id', 'O produto não existe na base de dados');
        }
        // validação pra verificar se existe uma quantidade de produto x
        if (!isset($config['y_product_amount']) || !is_numeric($config['y_product_amount'])) {
            $validator->errors()->add('config.y_product_amount', 'O produto precisa ter uma quantidade.');
        }
        // validação pra verificar se o produto x existe
        if (!isset($config['y_product_id']) || !is_numeric($config['y_product_id'])) {
            $validator->errors()->add('config.y_product_id', 'O produto não existe na base de dados');
        }
    }
}
