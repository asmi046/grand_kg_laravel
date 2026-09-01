@extends('layouts.all')

@section('main')
    <x-page-header title="О компании" />
    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main title="О компании"></x-breadcrumbs.main>
        </div>
    </section>

    <x-about-section />
@endsection
