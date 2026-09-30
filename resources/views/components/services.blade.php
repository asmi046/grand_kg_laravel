<section class="services section" id="services" aria-labelledby="services-title">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">Практики</p>
            <h2 id="services-title">Услуги юридическим лицам</h2>
        </div>
        <div class="services-grid">
            @foreach($services as $index => $service)
            <article class="service-card">
                <div class="service-card-head">
                    <div class="service-card-icon">
                        <svg class="sprite_icon"><use xlink:href="#{{ $service->icon }}"></use></svg>
                    </div>
                    <span class="service-card-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h3>{{ $service->title }}</h3>
                <p>{{ $service->short_description }}</p>
                <a class="button button-outline service-link" href="{{ route('services.show', $service->slug) }}">Подробнее</a>
            </article>
            @endforeach
        </div>
    </div>
</section>
