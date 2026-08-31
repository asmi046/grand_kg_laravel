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
        Schema::create('price_offers', function (Blueprint $table) {
            $table->id();
            // Заголовок секции для группировки услуг (например, "Консультации", "Представительство в суде")
            $table->string('section_title')->nullable();
            // Наименование услуги
            $table->string('title');
            // Подробное описание услуги или условия её оказания
            $table->string('description', 1000)->nullable();
            // Стоимость услуги в рублях
            $table->integer('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_offers');
    }
};
