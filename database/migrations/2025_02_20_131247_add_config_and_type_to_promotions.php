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
        Schema::table('promotions', function (Blueprint $table) {
            $table->json('config')->nullable(); // Regras espec�ficas de cada tipo de promo��o

            // $table->unsignedBigInteger('promotion_type_id');
            // $table->foreign('promotion_type_id')->references('id')->on('promotion_types');

            $table->foreignId('promotion_type_id')->constrained()->onDelete('cascade');
        });
    }
};
