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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('menu_name')->comment('Название меню');
            $table->string('title', 500)->comment('Анкор ссылки');
            $table->integer('order')->default(0)->comment('Порядок вывода');
            $table->integer('parent')->nullable()->comment('Радительский пункт');
            $table->string('lnk', 1500)->default('#')->comment('Ссылка');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
