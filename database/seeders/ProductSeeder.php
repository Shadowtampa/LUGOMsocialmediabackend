<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();

        $products = [
            [
                'name' => 'Smartphone XYZ',
                'description' => 'Smartphone de última geração com câmera de alta resolução',
                'condition' => 'new',
                'available' => true,
                'user_id' => $user->id,
                'prices' => [
                    [
                        'price' => 1999.99,
                        'start_date' => now()->subMonths(3),
                        'end_date' => now()->subMonths(1),
                    ],
                    [
                        'price' => 1899.99,
                        'start_date' => now()->subMonths(1),
                        'end_date' => now(),
                    ],
                    [
                        'price' => 1799.99,
                        'start_date' => now(),
                        'end_date' => now()->addMonths(2),
                    ],
                ],
            ],
            [
                'name' => 'Notebook ABC',
                'description' => 'Notebook potente para trabalho e jogos',
                'condition' => 'new',
                'available' => true,
                'user_id' => $user->id,
                'prices' => [
                    [
                        'price' => 4999.99,
                        'start_date' => now()->subMonths(2),
                        'end_date' => now()->subMonths(1),
                    ],
                    [
                        'price' => 4799.99,
                        'start_date' => now()->subMonths(1),
                        'end_date' => now(),
                    ],
                    [
                        'price' => 4599.99,
                        'start_date' => now(),
                        'end_date' => now()->addMonths(3),
                    ],
                ],
            ],
            [
                'name' => 'Fone de Ouvido Pro',
                'description' => 'Fone de ouvido wireless com cancelamento de ruído',
                'condition' => 'new',
                'available' => true,
                'user_id' => $user->id,
                'prices' => [
                    [
                        'price' => 799.99,
                        'start_date' => now()->subMonths(1),
                        'end_date' => now(),
                    ],
                    [
                        'price' => 749.99,
                        'start_date' => now(),
                        'end_date' => now()->addMonths(1),
                    ],
                ],
            ],
        ];

        foreach ($products as $productData) {
            $prices = $productData['prices'];
            unset($productData['prices']);

            $product = Product::create($productData);

            foreach ($prices as $price) {
                $product->prices()->create($price);
            }
        }
    }
}
