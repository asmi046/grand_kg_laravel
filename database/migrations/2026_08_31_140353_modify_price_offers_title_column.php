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
        Schema::table('price_offers', function (Blueprint $table) {
            $table->string('title', 800)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Колонка намеренно не сужается обратно до 255 символов: в таблице уже
     * могут быть заголовки длиннее 255 символов, и их обрезка при откате
     * приводит к потере данных и предупреждениям MySQL.
     */
    public function down(): void
    {
        //
    }
};
