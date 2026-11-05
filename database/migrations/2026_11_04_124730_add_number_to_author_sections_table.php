<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('author_sections', function (Blueprint $table) {
            $table->unsignedTinyInteger('number')->nullable()->after('title')->comment('Номер раздела в указателе');
        });
    }

    public function down(): void
    {
        Schema::table('author_sections', function (Blueprint $table) {
            $table->dropColumn('number');
        });
    }
};
