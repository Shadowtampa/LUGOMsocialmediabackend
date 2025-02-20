<?php

namespace App\Interfaces;

use Illuminate\Validation\Validator;

interface PromotionConfigValidator
{
    public function validate(array $config, Validator $validator): void;
}
