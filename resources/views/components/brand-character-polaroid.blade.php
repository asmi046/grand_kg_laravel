@props([
    'image' => '',
    'imageAlt' => '',
    'caption' => '',
])

@php
    // Принимаем и путь относительно public, и готовый URL (например, на диске storage).
    $imageUrl = filled($image)
        ? (preg_match('#^(https?:)?//#', $image) ? $image : asset($image))
        : '';
@endphp

<figure class="brand-character-polaroid">
    <img src="{{ $imageUrl }}" alt="{{ $imageAlt }}" loading="lazy" decoding="async" />

    @if($caption)
        <figcaption class="brand-character-polaroid__caption">{{ $caption }}</figcaption>
    @endif
</figure>
