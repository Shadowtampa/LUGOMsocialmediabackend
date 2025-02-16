<?php

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name'); // Nome do produto
            $table->text('description')->nullable(); // Descrição do produto, pode ser nula
            $table->enum('condition', ['new', 'used']); // Condição do produto: novo ou usado
            $table->boolean('available')->default(true); // Disponibilidade do produto, padrão é disponível
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
