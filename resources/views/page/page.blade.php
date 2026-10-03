@extends('layouts.all')

@section('main')
    <x-page-header :title="$page->title" />

    <section>
        <div class="container text_styles">
            {!! $page->description !!}
        </div>
    </section>
@endsection
