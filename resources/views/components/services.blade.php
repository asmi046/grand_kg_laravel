<section class="services section" id="services" aria-labelledby="services-title">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">Практики</p>
            <h2 id="services-title">Услуги юридическим лицам</h2>
        </div>
        <div class="services-grid">
            @foreach ($services as $index => $service)
                <x-service-card :title="$service->title" :slug="route('services.show', $service->slug)" :icon="$service->icon" :description="$service->short_description"
                    :number="$index + 1" />
            @endforeach
            <x-service-card title="Авторское право" slug="/author" icon="law-52"
                description="Комплексная защита авторских прав, включая консультации и сопровождение в судах."
                number="5" />
        </div>
    </div>
</section>
