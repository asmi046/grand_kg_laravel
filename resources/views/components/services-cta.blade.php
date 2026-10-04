@props([
    'title' => 'Не нашли нужную вам услугу?',
    'subtitle' => 'Свяжитесь с нами и мы поможем решить вашу проблему',
])

<section class="services-cta section" aria-labelledby="services-cta-title">
    <div class="container services-cta-inner">
        <h2 id="services-cta-title">{{ $title }}</h2>
        <p class="services-cta-text">{{ $subtitle }}</p>
        <div class="services-cta-actions">
            <a class="button button-light" href="tel:+79102171919">Позвонить</a>
            <a class="button button-ghost" href="{{ contact('max') }}" target="_blank" rel="noopener">
                <svg class="sprite_icon">
                    <use xlink:href="#icon-max"></use>
                </svg>
                Написать в Max
            </a>
        </div>
    </div>
</section>
