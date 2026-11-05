<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('author_subsections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('author_section_id')
                ->constrained('author_sections')
                ->cascadeOnDelete();
            $table->string('title')->comment('Заголовок подраздела');
            $table->string('slug')->unique()->comment('Идентификатор подраздела (путь относительно /avtor)');
            $table->string('number')->nullable()->comment('Номер подраздела, например 1.1.1');
            $table->text('description')->nullable()->comment('Описание подраздела');
            $table->string('img')->nullable()->comment('Изображение подраздела');
            $table->unsignedInteger('price')->nullable()->comment('Цена подраздела, руб.');
            $table->string('cross_reference')->nullable()->comment('Номер подраздела для кросс-ссылки');
            $table->unsignedInteger('order')->default(0)->comment('Порядок сортировки подраздела');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('author_subsections');
    }
};
