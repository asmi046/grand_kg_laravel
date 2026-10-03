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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->comment('Заголовок');
            $table->string('slug')->unique()->comment('Слаг');
            $table->integer('parent')->nullable()->comment('Родительская страница');
            $table->string('template')->nullable()->comment('Имя шаблона');
            $table->string('img', 800)->nullable()->comment('Картинка страницы');
            $table->longText('description')->nullable()->comment('Текст страницы');
            $table->json('images')->nullable()->comment('Галерея изображений');
            $table->json('files')->nullable()->comment('Файлы');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
