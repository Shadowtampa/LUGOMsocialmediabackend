<?php

namespace Database\Seeders;

use App\Models\Promotion;
use App\Models\PromotionType;
use App\Models\User;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        /**
         * Tipo de promoção: Desconto Fixo
         * Campos necessários:
         * - discount_amount: valor do desconto fixo
         * - product_id: ID do produto ao qual o desconto se aplica
         */
        $fixedType = PromotionType::create([
            'name' => 'Desconto Fixo',
        ]);

        /**
         * Tipo de promoção: Desconto Percentual
         * Campos necessários:
         * - discount_percentage: percentual de desconto
         * - product_id: ID do produto ao qual o desconto se aplica
         */
        $percentageType = PromotionType::create([
            'name' => 'Desconto Percentual',
        ]);

        /**
         * Tipo de promoção: Compre X Leve Y
         * Campos necessários:
         * - x_product_id: ID do produto X
         * - x_product_amount: quantidade do produto X a ser comprada
         * - y_product_id: ID do produto Y
         * - y_product_amount: quantidade do produto Y a ser ganha
         */
        $buyXGetYType = PromotionType::create([
            'name' => 'Compre X Leve Y',
        ]);

        $promotions = [
            // Promoções de Desconto Fixo
            [
                'name' => 'Desconto Fixo R$ 50',
                'description' => 'Desconto fixo de R$ 50 em compras acima de R$ 200',
                'start_date' => now(),
                'end_date' => now()->addMonths(1),
                'promotion_type_id' => $fixedType->id,
                'config' => json_encode([
                    'discount_amount' => 50.00,
                    'product_id' => 1,
                ]),
                'user_id' => $user->id,
            ],
            [
                'name' => 'Desconto Fixo R$ 100',
                'description' => 'Desconto fixo de R$ 100 em compras acima de R$ 500',
                'start_date' => now(),
                'end_date' => now()->addMonths(2),
                'promotion_type_id' => $fixedType->id,
                'config' => json_encode([
                    'discount_amount' => 100.00,
                    'product_id' => 1,
                ]),
                'user_id' => $user->id,
            ],
            // Promoções de Desconto Percentual
            [
                'name' => '10% OFF',
                'description' => '10% de desconto em compras acima de R$ 300',
                'start_date' => now(),
                'end_date' => now()->addMonths(1),
                'promotion_type_id' => $percentageType->id,
                'config' => json_encode([
                    'discount_percentage' => 10,
                    'product_id' => 2,
                ]),
                'user_id' => $user->id,
            ],
            [
                'name' => '20% OFF',
                'description' => '20% de desconto em compras acima de R$ 800',
                'start_date' => now(),
                'end_date' => now()->addMonths(2),
                'promotion_type_id' => $percentageType->id,
                'config' => json_encode([
                    'discount_percentage' => 20,
                    'product_id' => 2,
                ]),
                'user_id' => $user->id,
            ],
            // Promoções Compre X Leve Y
            [
                'name' => 'Compre 2 Leve 1',
                'description' => 'Compre 2 produtos e leve 1 grátis',
                'start_date' => now(),
                'end_date' => now()->addMonths(1),
                'promotion_type_id' => $buyXGetYType->id,
                'config' => json_encode([
                    'x_product_id' => 1,
                    'x_product_amount' => 2,
                    'y_product_id' => 2,
                    'y_product_amount' => 1,
                ]),
                'user_id' => $user->id,
            ],
            [
                'name' => 'Compre 3 Leve 2',
                'description' => 'Compre 3 produtos e leve 2 grátis',
                'start_date' => now(),
                'end_date' => now()->addMonths(2),
                'promotion_type_id' => $buyXGetYType->id,
                'config' => json_encode([
                    'x_product_id' => 3,
                    'x_product_amount' => 3,
                    'y_product_id' => 2,
                    'y_product_amount' => 2,
                ]),
                'user_id' => $user->id,
            ],
        ];

        foreach ($promotions as $promotion) {
            Promotion::create($promotion);
        }
    }
}
