@extends('layouts.all')

@section('main')
    <x-page-header title="Услуги" />
    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main title="Услуги"></x-breadcrumbs.main>
        </div>
    </section>

    <x-services />

    <x-services-cta />
@endsection
