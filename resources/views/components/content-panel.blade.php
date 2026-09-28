@props([
    'eyebrow' => null,
    'title' => null,
    'section' => 'about',
])

<section class="{{ $section }}">
    <div class="container">
        <div class="content-panel">
            @if($eyebrow)
                <p class="eyebrow">{{ $eyebrow }}</p>
            @endif
            @if($title)
                <h2>{{ $title }}</h2>
            @endif
            {{ $slot }}
        </div>
    </div>
</section>
