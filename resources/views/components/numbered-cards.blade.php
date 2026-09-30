@props([
    'eyebrow' => null,
    'title' => null,
    'section' => 'numbered-cards',
    'bare' => false,
    'items' => [],
])

@if(!$bare)
    <section class="{{ $section }} section" id="{{ $section }}">
        <div class="container">
@endif

@if($eyebrow || $title)
    <div class="section-heading">
        @if($eyebrow)
            <p class="eyebrow">{{ $eyebrow }}</p>
        @endif
        @if($title)
            <h2>{{ $title }}</h2>
        @endif
    </div>
@endif

<div class="numbered-cards-grid">
    @foreach($items as $index => $item)
        <article class="numbered-card">
            <div class="numbered-card-head">
                <span class="numbered-card-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
            </div>
            <p class="numbered-card-text">{{ $item }}</p>
        </article>
    @endforeach
</div>

@if(!$bare)
        </div>
    </section>
@endif
