@props([
    'eyebrow' => null,
    'title' => null,
    'section' => 'about',
    'bare' => false,
])

@if(!$bare)
    <section class="{{ $section }} section">
        <div class="container">
@endif

<div class="content-panel">
    @if($eyebrow)
        <p class="eyebrow">{{ $eyebrow }}</p>
    @endif
    @if($title)
        <h2>{{ $title }}</h2>
    @endif
    {{ $slot }}
</div>

@if(!$bare)
        </div>
    </section>
@endif
