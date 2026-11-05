@props(['title', 'slug', 'icon' => null, 'number' => null])

<article class="service-card author-subsection-card">
    <div class="service-card-head">
        <div class="service-card-icon">
            <svg class="sprite_icon">
                <use xlink:href="#{{ $icon }}"></use>
            </svg>
        </div>
        <span class="service-card-num">{{ $number ? str_pad((string) $number, 2, '0', STR_PAD_LEFT) : '' }}</span>
    </div>
    <h3>{{ $title }}</h3>
    <a class="button button-outline service-link" href="{{ $slug }}">Подробнее</a>
</article>
