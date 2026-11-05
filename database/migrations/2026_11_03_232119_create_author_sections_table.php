<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('author_sections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title')->comment('Заголовок раздела авторского права');
            $table->string('slug')->unique()->comment('Уникальный идентификатор раздела (URL)');
            $table->text('description')->nullable()->comment('Описание раздела');
            $table->string('img')->nullable()->comment('Изображение раздела');
            $table->string('icon')->comment('SVG-иконка раздела (sprite ID)');
            $table->unsignedInteger('order')->default(0)->comment('Порядок сортировки раздела');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('author_sections');
    }
};
