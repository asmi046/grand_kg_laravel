<?php

use App\Models\AuthorSection;
use Database\Seeders\AuthorSectionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

it('forms a slug from the title when saving', function () {
    $section = AuthorSection::create([
        'title' => 'Защита авторских прав и интеллектуальной собственности',
        'icon' => 'law-52',
    ]);

    expect($section->slug)->toBe('zashhita-avtorskix-prav-i-intellektualnoi-sobstvennosti');
});

it('keeps an explicitly set slug', function () {
    $section = AuthorSection::create([
        'title' => 'Брендинг и фирменный стиль',
        'slug' => 'firma',
        'icon' => 'law-12',
    ]);

    expect($section->slug)->toBe('firma');
});

it('makes an automatically generated slug unique', function () {
    AuthorSection::create([
        'title' => 'Брендинг и фирменный стиль',
        'icon' => 'law-12',
    ]);

    $second = AuthorSection::create([
        'title' => 'Брендинг и фирменный стиль',
        'icon' => 'law-12',
    ]);

    expect($second->slug)->toBe('brending-i-firmennyi-stil-2');
});

it('seeds author sections', function () {
    Storage::fake('public');

    $this->seed(AuthorSectionSeeder::class);

    expect(AuthorSection::count())->toBe(7);

    $section = AuthorSection::where('slug', 'firma')->first();

    expect($section->title)->toBe('Брендинг и фирменный стиль')
        ->and($section->icon)->toBe('law-12')
        ->and($section->order)->toBe(2)
        ->and($section->description)->not->toBeEmpty();
});

it('stores section images in storage', function () {
    $seeder = new AuthorSectionSeeder;

    if ($seeder->sourceDirectory() === null) {
        $this->markTestSkipped('Исходные изображения разделов не найдены в public/tmp/tihon');
    }

    Storage::fake('public');

    $this->seed(AuthorSectionSeeder::class);

    $section = AuthorSection::where('slug', 'smm')->first();

    expect($section->img)->toStartWith('author-sections/')
        ->and(Storage::disk('public')->exists($section->img))->toBeTrue();
});

it('shows author sections on the author rights page', function () {
    AuthorSection::create([
        'title' => 'Брендинг и фирменный стиль',
        'slug' => 'firma',
        'icon' => 'law-12',
        'description' => 'Задумались о персонализации и брендировании своего Дела?',
        'order' => 1,
    ]);

    $this->get(route('author-rights.index'))
        ->assertOk()
        ->assertSee('Брендинг и фирменный стиль')
        ->assertSee('Задумались о персонализации и брендировании своего Дела?')
        ->assertSee(route('author-rights.show', 'firma'));
});

it('shows a single author section page', function () {
    $section = AuthorSection::create([
        'title' => 'Брендинг и фирменный стиль',
        'slug' => 'firma',
        'icon' => 'law-12',
        'description' => 'Задумались о персонализации и брендировании своего Дела?',
    ]);

    $this->get(route('author-rights.show', $section))
        ->assertOk()
        ->assertSee('Брендинг и фирменный стиль')
        ->assertSee('Задумались о персонализации и брендировании своего Дела?');
});
