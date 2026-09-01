<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title')->comment('Заголовок услуги');
            $table->string('slug')->unique()->comment('Уникальный идентификатор услуги (URL)');
            $table->string('description', 1000)->nullable()->comment('Полное описание услуги');
            $table->string('short_description', 255)->nullable()->comment('Краткое описание услуги для карточек');
            $table->string('icon', 255)->nullable()->comment('SVG-иконка услуги (sprite ID)');
            $table->string('image', 255)->nullable()->comment('Изображение услуги');
            $table->json('sections')->nullable()->comment('JSON-поле для хранения дополнительных секций услуги');
            $table->unsignedInteger('order')->default(0)->comment('Порядок сортировки услуги');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
