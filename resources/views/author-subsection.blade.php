@extends('layouts.all')

@section('body-class', 'autor_right')

@section('main')
    <x-author-rights.hero-section
        :title="$subsection->title"
        :image="$subsection->img_url"
        :image-alt="$subsection->title"
        :caption="$subsection->number_label ? 'Направление ' . $subsection->number_label : ''"
        button-text="Будем рады ответить на ваши вопросы"
        :button-href="route('contacts.index')"
        reverse />

    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main :title="$subsection->title" :breadcrumbs="$breadcrumbs" />
        </div>
    </section>

    <x-content-panel>
        <p>{{ $subsection->description }}</p>
    </x-content-panel>

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
