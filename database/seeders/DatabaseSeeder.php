<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Criar usuário Luis
        User::create([
            'name' => 'Luis',
            'email' => 'luis@email.com',
            'password' => Hash::make('senha123'),
        ]);

        $this->call([
            ProductSeeder::class,
            PromotionSeeder::class,
        ]);
    }
}
