@props([
    'title' => '',
    'subtitle' => '',
    'buttonText' => 'Будем рады ответить на ваши вопросы',
    'buttonHref' => '#contact-form',
])

<section class="autor-hero" aria-labelledby="autor-hero-title">
    <div class="container">
        <h1 class="autor-hero__title" id="autor-hero-title">{!! $title !!}</h1>
        @if ($subtitle)
            <p class="autor-hero__subtitle">{{ $subtitle }}</p>
        @endif
        <div class="autor-hero__actions">
            <a class="button" href="{{ $buttonHref }}">{{ $buttonText }}</a>
        </div>
    </div>
</section>
