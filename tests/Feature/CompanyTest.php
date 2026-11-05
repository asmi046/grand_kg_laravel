<?php

use App\Models\AuthorSection;
use App\Models\AuthorSubsection;
use App\Models\Company;
use Database\Seeders\AuthorSectionSeeder;
use Database\Seeders\AuthorSubsectionSeeder;
use Database\Seeders\CompanySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('computes the index letter from the title', function () {
    expect(Company::computeLetter('Aviasales'))->toBe('A')
        ->and(Company::computeLetter('«Авангард ФК»'))->toBe('А')
        ->and(Company::computeLetter('"33 пингвина"'))->toBe('Цифры')
        ->and(Company::computeLetter('КПД-1'))->toBe('К');
});

it('fills the letter on save', function () {
    $company = Company::create(['title' => 'зЁрнаРум']);

    expect($company->letter)->toBe('З');
});

it('builds a years label', function () {
    $company = Company::create(['title' => 'Aviasales', 'year_from' => 2014, 'year_to' => 2016]);
    $ongoing = Company::create(['title' => 'RiverHouse', 'year_from' => 2024]);
    $single = Company::create(['title' => 'SVM', 'year_from' => 2025, 'year_to' => 2025]);

    expect($company->years_label)->toBe('2014 - 2016')
        ->and($ongoing->years_label)->toBe('2024 - …')
        ->and($single->years_label)->toBe('2025');
});

it('seeds the alphabet index', function () {
    $this->seed(AuthorSectionSeeder::class);
    $this->seed(AuthorSubsectionSeeder::class);
    $this->seed(CompanySeeder::class);

    expect(Company::count())->toBe(113);

    $company = Company::where('title', 'Aviasales')->first();

    expect($company->letter)->toBe('A')
        ->and($company->year_from)->toBe(2014)
        ->and($company->year_to)->toBe(2016)
        ->and($company->region)->toBe('г. Курск')
        ->and($company->is_published)->toBeTrue()
        ->and($company->is_own_project)->toBeFalse()
        ->and($company->sections->pluck('number')->all())->toBe([1, 2, 4, 5, 6])
        ->and($company->subsections->pluck('number')->all())->toBe(['1.1.1', '2.1.1', '4.1.1', '4.1.3', '5.1.1', '5.1.2', '6.1.2']);
});

it('stores the social link of own projects', function () {
    $this->seed(AuthorSectionSeeder::class);
    $this->seed(AuthorSubsectionSeeder::class);
    $this->seed(CompanySeeder::class);

    $company = Company::where('title', '«Надо Пати? Нате!»')->first();

    expect($company->is_own_project)->toBeTrue()
        ->and($company->url)->toBe('https://vk.ru/npn_supp');
});

it('puts companies into the digital bucket', function () {
    $this->seed(AuthorSectionSeeder::class);
    $this->seed(AuthorSubsectionSeeder::class);
    $this->seed(CompanySeeder::class);

    expect(Company::where('title', '"33 пингвина"')->first()->letter)->toBe('Цифры');
});

it('links companies with sections and subsections in both directions', function () {
    $section = AuthorSection::create(['title' => 'Защита авторских прав', 'slug' => 'ap-is', 'number' => 1, 'icon' => 'law-52']);
    $subsection = AuthorSubsection::create([
        'author_section_id' => $section->id,
        'title' => 'Сопровождение',
        'slug' => 'ap-is/support',
        'number' => '1.1.1',
    ]);

    $company = Company::create(['title' => 'Aviasales']);
    $company->sections()->attach($section->id);
    $company->subsections()->attach($subsection->id);

    expect($section->companies->pluck('id')->all())->toBe([$company->id])
        ->and($subsection->companies->pluck('id')->all())->toBe([$company->id]);
});
