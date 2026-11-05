@extends('layouts.all')

@section('body-class', 'autor_right')

@section('main')
    <x-author-rights.hero-section
        :title="$section->title"
        :image="$section->img_url"
        :image-alt="$section->title"
        :caption="$section->number ? 'Направление ' . str_pad((string) $section->number, 2, '0', STR_PAD_LEFT) : ''"
        button-text="Будем рады ответить на ваши вопросы"
        :button-href="route('contacts.index')" />

    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main :title="$section->title" :breadcrumbs="$breadcrumbs" />
        </div>
    </section>

    <x-content-panel>
        <p>{{ $section->description }}</p>
    </x-content-panel>

    <section class="services section" id="subsections" aria-labelledby="author-section-subsections-title">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">мы предлагаем</p>
                <h2 id="author-section-subsections-title">Услуги по направлению</h2>
            </div>

            <div class="services-grid">
                @foreach ($subsections as $subsection)
                    <x-author-rights.subsection-card :title="$subsection->title" :slug="$subsection->url"
                        :icon="$section->icon" :number="$loop->iteration" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="portfolio section" id="portfolio">
        <div class="container content-stack">
            <div class="section-heading">
                <p class="eyebrow">компетенции</p>
                <h2>Портфолио по направлению</h2>
            </div>

            <x-author-rights.alpha-index :companies="$companies" />
        </div>
    </section>

    <x-services-cta />
@endsection
