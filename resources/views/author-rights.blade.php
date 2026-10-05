@extends('layouts.all')

@section('main')
    <x-page-header title="Авторское право" />

    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main title="Авторское право" :breadcrumbs="$breadcrumbs" />
        </div>
    </section>


    <x-services-cta />
@endsection
