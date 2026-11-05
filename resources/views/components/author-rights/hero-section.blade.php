@props([
    'title' => '',
    'buttonText' => 'Будем рады ответить на ваши вопросы',
    'buttonHref' => '#contact-form',
    'image' => '',
    'imageAlt' => '',
    'caption' => '',
    'reverse' => false,
])

<section @class(['autor-hero-section', 'autor-hero-section--reverse' => $reverse])
    aria-labelledby="autor-hero-section-title">
    <div class="container autor-hero-section__inner">
        <div class="autor-hero-section__media">
            <x-brand-character-polaroid :image="$image" :image-alt="$imageAlt" :caption="$caption" />
        </div>

        <div class="autor-hero-section__content">
            <h1 class="autor-hero-section__title" id="autor-hero-section-title">{!! $title !!}</h1>

            <div class="autor-hero-section__actions">
                <a class="button" href="{{ $buttonHref }}">{{ $buttonText }}</a>
            </div>
        </div>
    </div>
</section>
