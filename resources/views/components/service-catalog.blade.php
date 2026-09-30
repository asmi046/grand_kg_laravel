@props([
    'eyebrow' => 'Услуги',
    'title' => '',
    'badge' => '',
    'section' => 'service-catalog',
    'bare' => false,
    'groups' => [],
])

@if(!$bare)
    <section class="{{ $section }} section" id="{{ $section }}">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">{{ $eyebrow }}</p>
                <h2>{{ $title }}</h2>
            </div>
@endif

<div class="service-catalog-grid">
    @foreach($groups as $group)
        <article class="catalog-card">
            <div class="catalog-card-head">
                <span class="catalog-card-badge">{{ $badge }}</span>
                <h3>{{ $group['title'] }}</h3>
            </div>
            <ul class="catalog-card-list">
                @foreach($group['items'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </article>
    @endforeach
</div>

@if(!$bare)
        </div>
    </section>
@endif
