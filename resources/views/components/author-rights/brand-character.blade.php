@props([
    'eyebrow' => '',
    'title' => '',
    'image' => '',
    'imageAlt' => '',
    'caption' => '',
])

<section class="brand-character section" aria-labelledby="brand-character-title">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">{{ $eyebrow }}</p>
            <h2 id="brand-character-title">{{ $title }}</h2>
        </div>
        <div class="brand-character-grid">
            <x-brand-character-polaroid :image="$image" :image-alt="$imageAlt" :caption="$caption" />
            <div class="brand-character-content">
                {{ $slot }}
            </div>
        </div>
    </div>
</section>