@props([
    'title' => '',
    'image' => 'img/about-banner.webp'
])

<section class="page-header" style="--page-header-bg: url('{{ asset($image) }}')">
    <div class="container">
        <h1>{{ $title }}</h1>
    </div>
</section>
