@extends('layouts.all')

@section('title', $title)
@section('description', $description)

@section('main')
    <x-page-header :title="$service->title" />

    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main :title="$service->title"></x-breadcrumbs.main>
        </div>
    </section>

    <section class="service-page">
        <div class="container">
            @if($service->short_description)
                <p>{{ $service->short_description }}</p>
            @endif
            @if($service->description)
                <div class="service-description">
                    {{ $service->description }}
                </div>
            @endif
            @if($service->sections)
                <div class="service-sections">
                    @foreach($service->sections as $section)
                        <div class="service-section">
                            @if(isset($section['title']))
                                <h2>{{ $section['title'] }}</h2>
                            @endif
                            @if(isset($section['content']))
                                <div>{{ $section['content'] }}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <x-content-panel section="about">
        <p>
            Мы сопровождаем процедуры банкротства юридических лиц, представляем интересы
            должников и кредиторов, взаимодействуем с арбитражными управляющими и
            налоговыми органами. Наша задача — защитить интересы бизнеса, оценить
            возможные риски и выработать правовую стратегию с учётом финансового
            положения компании и обстоятельств конкретного дела.
        </p>

        <p>
            Мы оказываем полный спектр услуг: от первичной диагностики финансового
            состояния и оценки банкротных рисков до ведения обособленных споров об
            оспаривании сделок, привлечении к субсидиарной ответственности и взыскании
            убытков с контролирующих лиц. Также сопровождаем трансграничные банкротные
            проекты, включая параллельные процессы в нескольких юрисдикциях.
        </p>
    </x-content-panel>

    <x-principals />

    <x-services-cta />
@endsection
