@props([
    'title' => '',
    'subtitle' => '',
    'buttonText' => 'Будем рады ответить на ваши вопросы',
    'image' => '',
    'imageAlt' => '',
    'caption' => '',
    'reverse' => false,
])

@php
    $buttonLink = telegram_chat_link() ?: route('contacts.index');
@endphp

<section @class(['autor-hero-section', 'autor-hero-section--reverse' => $reverse])
    aria-labelledby="autor-hero-section-title">
    <div class="container autor-hero-section__inner">
        <div class="autor-hero-section__media">
            <x-brand-character-polaroid :image="$image" :image-alt="$imageAlt" :caption="$caption" />
        </div>

        <div class="autor-hero-section__content">
            <h1 class="autor-hero-section__title" id="autor-hero-section-title">{!! $title !!}</h1>

            @if($subtitle)
                <p class="autor-hero__subtitle">{{ $subtitle }}</p>
            @endif

            <div class="autor-hero-section__actions">
                <a class="button" href="{{ $buttonLink }}" target="_blank" rel="noopener">{{ $buttonText }}</a>
            </div>
        </div>
    </div>
</section>
