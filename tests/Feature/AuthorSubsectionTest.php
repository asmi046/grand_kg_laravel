<?php

use App\Models\AuthorSection;
use App\Models\AuthorSubsection;
use App\Services\AuthorImages;
use Database\Seeders\AuthorSectionSeeder;
use Database\Seeders\AuthorSubsectionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

it('forms a slug from the title when saving', function () {
    $section = AuthorSection::create(['title' => 'Сопровождение', 'icon' => 'law-52']);

    $subsection = AuthorSubsection::create([
        'author_section_id' => $section->id,
        'title' => 'Досудебная защита',
        'icon' => 'law-52',
    ]);

    expect($subsection->slug)->toBe('soprovozdenie/dosudebnaia-zashhita');
});

it('keeps an explicitly set slug', function () {
    $section = AuthorSection::create(['title' => 'Сопровождение', 'icon' => 'law-52']);

    $subsection = AuthorSubsection::create([
        'author_section_id' => $section->id,
        'title' => 'Досудебная защита',
        'slug' => 'ap-is/dosudebka',
    ]);

    expect($subsection->slug)->toBe('ap-is/dosudebka');
});

it('belongs to a section and is returned by the section relation', function () {
    $section = AuthorSection::create(['title' => 'Сопровождение', 'icon' => 'law-52']);

    $subsection = AuthorSubsection::create([
        'author_section_id' => $section->id,
        'title' => 'Досудебная защита',
        'slug' => 'ap-is/dosudebka',
        'order' => 1,
    ]);

    expect($subsection->section->is($section))->toBeTrue()
        ->and($section->subsections->pluck('id')->all())->toBe([$subsection->id]);
});

it('builds a price label and a url', function () {
    $section = AuthorSection::create(['title' => 'Сопровождение', 'icon' => 'law-52']);

    $subsection = AuthorSubsection::create([
        'author_section_id' => $section->id,
        'title' => 'Сопровождение',
        'slug' => 'ap-is/support',
        'price' => 22200,
    ]);

    expect($subsection->price_label)->toBe('от 22 200 руб.')
        ->and($subsection->url)->toBe(url('/avtor/ap-is/support'));
});

it('resolves a cross reference to another subsection', function () {
    $section = AuthorSection::create(['title' => 'Сопровождение', 'icon' => 'law-52']);

    $referenced = AuthorSubsection::create([
        'author_section_id' => $section->id,
        'title' => 'Регистрация логотипов',
        'slug' => 'ap-is/fips',
        'number' => '2.1.3',
    ]);

    $subsection = AuthorSubsection::create([
        'author_section_id' => $section->id,
        'title' => 'Сопровождение',
        'slug' => 'ap-is/support',
        'number' => '1.1.1',
        'cross_reference' => '2.1.3',
    ]);

    expect($subsection->crossReferencedSubsection()->is($referenced))->toBeTrue();
});

it('seeds author subsections', function () {
    Storage::fake('public');

    $this->seed(AuthorSectionSeeder::class);
    $this->seed(AuthorSubsectionSeeder::class);

    expect(AuthorSubsection::count())->toBe(20);

    $subsection = AuthorSubsection::where('slug', 'ap-is/support')->first();

    expect($subsection->title)->toBe('Сопровождение')
        ->and($subsection->number)->toBe('1.1.1')
        ->and($subsection->price)->toBe(22200)
        ->and($subsection->cross_reference)->toBe('2.1.3')
        ->and($subsection->section->slug)->toBe('ap-is');
});

it('nests every subsection address in its parent section', function () {
    Storage::fake('public');

    $this->seed(AuthorSectionSeeder::class);
    $this->seed(AuthorSubsectionSeeder::class);

    AuthorSubsection::with('section')->get()->each(function (AuthorSubsection $subsection) {
        expect($subsection->slug)->toStartWith($subsection->section->slug.'/');
    });

    expect(AuthorSubsection::pluck('slug')->unique()->count())->toBe(AuthorSubsection::count());
});

it('shows an author subsection page', function () {
    $section = AuthorSection::create([
        'title' => 'Защита авторских прав',
        'slug' => 'ap-is',
        'icon' => 'law-52',
    ]);

    AuthorSubsection::create([
        'author_section_id' => $section->id,
        'title' => 'Сопровождение',
        'slug' => 'ap-is/support',
        'number' => '1.1.1',
        'description' => 'Крепко, берём ваше Творчество за руку.',
        'price' => 22200,
    ]);

    $this->get(route('author-rights.subsection', ['section' => $section->slug, 'subsection' => 'support']))
        ->assertOk()
        ->assertViewIs('author-subsection')
        ->assertSee('Сопровождение')
        ->assertSee('Крепко, берём ваше Творчество за руку.')
        ->assertSee('Направление 01.1.1');
});

it('builds a number label with a padded first part', function () {
    $section = AuthorSection::create(['title' => 'Сопровождение', 'icon' => 'law-52']);

    $subsection = AuthorSubsection::create([
        'author_section_id' => $section->id,
        'title' => 'Сопровождение',
        'slug' => 'ap-is/support',
        'number' => '1.1.1',
    ]);

    expect($subsection->number_label)->toBe('01.1.1');
});

it('returns 404 for an unknown author subsection', function () {
    $section = AuthorSection::create([
        'title' => 'Защита авторских прав',
        'slug' => 'ap-is',
        'icon' => 'law-52',
    ]);

    $this->get(route('author-rights.subsection', ['section' => $section->slug, 'subsection' => 'unknown']))
        ->assertNotFound();
});

it('stores subsection images in storage', function () {
    $images = new AuthorImages;

    if ($images->sourceSubDirectories('Подразделы_1') === []) {
        $this->markTestSkipped('Исходные изображения подразделов не найдены в public/tmp/tihon');
    }

    Storage::fake('public');

    $this->seed(AuthorSectionSeeder::class);
    $this->seed(AuthorSubsectionSeeder::class);

    $subsection = AuthorSubsection::where('slug', 'smm/posev')->first();

    expect($subsection->img)->toStartWith('author-subsections/')
        ->and(Storage::disk('public')->exists($subsection->img))->toBeTrue();
});
