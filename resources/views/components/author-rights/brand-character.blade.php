@props([
    'eyebrow' => '',
    'title' => '',
    'image' => '',
    'imageAlt' => '',
])

<section class="brand-character section" aria-labelledby="brand-character-title">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">{{ $eyebrow }}</p>
            <h2 id="brand-character-title">{{ $title }}</h2>
        </div>
        <div class="brand-character-grid">
            <figure class="brand-character-polaroid">
                <img src="{{ asset($image) }}" alt="{{ $imageAlt }}" loading="lazy" decoding="async" />
            </figure>
            <div class="brand-character-content">
                {{ $slot }}
            </div>
        </div>
    </div>
</section>