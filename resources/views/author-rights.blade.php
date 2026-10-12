@extends('layouts.all')

@section('body-class', 'autor_right')

@section('main')
    <x-author-rights.hero
        title="АВТОРСТВО, ИССЛЕДОВАНИЯ и ТВОРЧЕСТВО / БРЭНДЪ-ЛАБ"
        subtitle="Защита авторских прав и интеллектуальной собственности, юридическое обеспечение творческой деятельности, сопровождение проектов в сфере авторского права и интеллектуальной собственности. А так же маркетинговые исследования и брендинг."
    />

    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main title="Авторское право" :breadcrumbs="$breadcrumbs" />
        </div>
    </section>

    <x-content-panel>
        <p>
            Мы рады приветствовать Вас в Разделах нашего Сайта, посвящённых
            <strong>Авторскому Праву</strong> и <strong>Интеллектуальной Собственности</strong>
            (их защите и регистрации), маркетинговым изысканиям и разнообразным рекламным
            технологиям, включая <abbr title="Social Media Marketing">SMM</abbr>-продвижение
            полного цикла (от разработки до реализации).
        </p>
        <p>
            Мы горды и рады применять наш <strong>20+ летний опыт</strong> для понимания ваших
            задач и их реализаций. Как в виде длительных <em>Кампаний</em>, так и в виде разового
            «прикосновения» к вашему Делу. Наше <cite>Портфолио</cite> настолько широко и объёмно,
            что его верхушечки, иногда, замечают жители Аляски в ясные и похожие дни.
            Также, поступали жалобы и претензии от жителей Краснодарского Края, что
            высота и массивность нашего <cite>Портфолио</cite>, иногда, мешает им любоваться
            снежными шапками Кавказских хребтов.
        </p>
        <p>
            Мы, регулярно, приносим извинения и пытаемся не разрастаться. А оно, почему-то,
            происходит наоборот. В связи с чем, наш <strong>Коллектив</strong>, всегда, рад
            обоюдо-полезным взаимодействиям и открыт к разумным формам сотрудничества.
        </p>
    </x-content-panel>

    <section class="services section" id="services" aria-labelledby="author-rights-services-title">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">Помощь и защита</p>
                <h2 id="author-rights-services-title">Наши услуги</h2>
            </div>
            <div class="services-grid">
                <x-service-card title="Защита авторских прав и интеллектуальной собственности" slug="#"
                    icon="law-52" description="" :number="1" />
                <x-service-card title="Брендинг и фирменный стиль" slug="#" icon="law-12"
                    description="" :number="2" />
                <x-service-card
                    title="SMM / СММ / Позиционирование бренда в онлайн-пространстве" slug="#" icon="law-101"
                    description="" :number="3" />
                <x-service-card title="PR, маркетинг и аналитические изыскания" slug="#" icon="law-04"
                    description="" :number="4" />
                <x-service-card title="Эвенты, события, мероприятия и промоушн" slug="#" icon="law-17"
                    description="" :number="5" />
                <x-service-card
                    title="Дизайн, разработка, производство и согласование рекламы" slug="#" icon="law-104"
                    description="" :number="6" />
                <x-service-card
                    title="Судебная практика в авторском праве и интеллектуальной собственности" slug="#"
                    icon="law-21" description="" :number="7" />
            </div>
        </div>
    </section>


    <x-services-cta />
@endsection
