@extends('layouts.all')

@section('title', $title)
@section('description', $description)

@section('main')
    <x-page-header :title="$service->title" />

    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main :breadcrumbs="$breadcrumbs"></x-breadcrumbs.main>
        </div>
    </section>

    <section class="service-page">
        <div class="container">
            @if ($service->short_description)
                <p>{{ $service->short_description }}</p>
            @endif
            @if ($service->description)
                <div class="service-description">
                    {{ $service->description }}
                </div>
            @endif
            @if ($service->sections)
                <div class="service-sections">
                    @foreach ($service->sections as $section)
                        <div class="service-section">
                            @if (isset($section['title']))
                                <h2>{{ $section['title'] }}</h2>
                            @endif
                            @if (isset($section['content']))
                                <div>{{ $section['content'] }}</div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <x-services-cta />
@endsection
