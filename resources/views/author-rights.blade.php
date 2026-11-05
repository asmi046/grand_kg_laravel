@extends('layouts.all')

@section('body-class', 'autor_right')

@section('main')
    <x-author-rights.hero title="АВТОРСТВО, ИССЛЕДОВАНИЯ и ТВОРЧЕСТВО / БРЭНДЪ-ЛАБ"
        subtitle="Защита авторских прав и интеллектуальной собственности, юридическое обеспечение творческой деятельности, сопровождение проектов в сфере авторского права и интеллектуальной собственности. А так же маркетинговые исследования и брендинг." />

    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main title="Авторское право" :breadcrumbs="$breadcrumbs" />
        </div>
    </section>

    <x-content-panel>
        <p>
            Мы рады приветствовать Вас в Разделах нашего Сайта, посвящённых
            <strong>Авторскому Праву</strong> и <strong>Интеллектуальной Собственности</strong>
            (их разработке, защите и регистрации), маркетинговым изысканиям и разнообразным рекламным
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

    <x-author-rights.brand-character eyebrow="Чтобы вы не скучали" title="Знакомьтесь Тихонъ Грандович"
        image="img/autor/tihon_no_bg.webp"
        caption="С любовью Тихонъ!"
        imageAlt="Тихонъ Грандович — Бренд-Персонаж направления Авторства, Регистраций и Креатива">
        <p>
            Мы рады представить <dfn>Бренд-Персонажа</dfn> направления Авторства, Регистраций
            и Креатива. Знакомьтесь, <strong>Тихонъ</strong>. И ему приятно с вами познакомиться
            (он так и просил передать 😀).
        </p>
        <p>
            <strong>Опытнейший</strong> и <strong>серьёзнейший</strong> Мужчина в самом расцвете сил,
            в экваторе трудовых и достижений и карьерного роста. Специалист разноплановый, надо признать.
            <em>Делопроизводитель. Заведующий Лабораторией Креатива.</em>
        </p>
        <p>
            Рад не только подсказать советом (когда спрашивают), но и приложить усилия
            даже к самым сложным задачам.
        </p>
        <p>
            Вы можете пообщаться со мной на нашем Сайте в моих разделах, а, также, задать мне вопросы
            через <cite>Коллектив Бренд-Лабъ ООО «КГ ГрандЪ»</cite>, в наши <abbr title="Социальные сети">соц.сети</abbr>
            или в наш электронный ящик.
        </p>
        <p>
            <strong>Не теряемся!</strong> А если вы растерялись — не переживайте, мы поможем, подскажем
            и сопроводим.
        </p>
    </x-author-rights.brand-character>

    <section class="services section" id="services" aria-labelledby="author-rights-services-title">
        <div class="container">
            <div class="section-heading">
                <p class="eyebrow">Помощь и защита</p>
                <h2 id="author-rights-services-title">Наши услуги</h2>
            </div>
            <div class="services-grid">
                @foreach ($sections as $section)
                    <x-service-card :title="$section->title" :slug="route('author-rights.show', $section)"
                        :icon="$section->icon" :description="$section->description" :number="$loop->iteration" />
                @endforeach
            </div>
        </div>
    </section>


    <section class="portfolio section" id="portfolio">
        <div class="container content-stack">
            <div class="section-heading">
                <p class="eyebrow">компетенции</p>
                <h2>Наше портфолио</h2>
            </div>

            <x-content-panel bare>
                <p>
                    С гордостью и радостью – презентуем и облегчаем Вам поиск по нашему Портфолио.
                    Алфавитный перечень, где все буквы кликабельны и все разделы активны. Приятного
                    изучения!
                </p>
            </x-content-panel>

            <x-author-rights.alpha-index :companies="$companies" />
        </div>
    </section>

    <x-services-cta />
@endsection
