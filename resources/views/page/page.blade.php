@extends('layouts.all')

@section('main')
    <x-page-header :title="$page->title" />

    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main :title="$page->title"></x-breadcrumbs.main>
        </div>
    </section>

    <section>
        <div class="container text_styles">
            {!! $page->description !!}
        </div>
    </section>
@endsection
