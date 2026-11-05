<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('title')->unique()->comment('Название компании');
            $table->string('letter', 8)->comment('Буква алфавитного указателя');
            $table->string('url')->nullable()->comment('Внешняя ссылка (соцсети) для собственных проектов');
            $table->boolean('is_own_project')->default(false)->comment('Собственный авторский проект');
            $table->boolean('is_published')->default(true)->comment('Опубликована ли запись указателя');
            $table->unsignedSmallInteger('year_from')->nullable()->comment('Год начала периода');
            $table->unsignedSmallInteger('year_to')->nullable()->comment('Год окончания периода (null — по настоящее время)');
            $table->string('region')->nullable()->comment('Региональность');
            $table->unsignedInteger('order')->default(0)->comment('Порядок сортировки внутри буквы');

            $table->index(['letter', 'order']);
        });

        Schema::create('company_author_section', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->foreignId('author_section_id')->constrained('author_sections')->cascadeOnDelete();

            $table->unique(['company_id', 'author_section_id']);
        });

        Schema::create('company_author_subsection', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->foreignId('author_subsection_id')->constrained('author_subsections')->cascadeOnDelete();

            $table->unique(['company_id', 'author_subsection_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_author_subsection');
        Schema::dropIfExists('company_author_section');
        Schema::dropIfExists('companies');
    }
};
