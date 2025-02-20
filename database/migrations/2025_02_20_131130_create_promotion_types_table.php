<?php

use App\Models\PromotionType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promotion_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name')->unique(); // Exemplo: 'Fixed Discount', 'Percentage Discount'
        });

        PromotionType::insert([
            ['name' => 'Exemplo de nome de tipo de promocao'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_types');
    }
};
