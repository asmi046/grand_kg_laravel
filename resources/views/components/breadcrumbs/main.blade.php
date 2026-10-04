@props(['title' => null, 'article' => null, 'brand' => null, 'breadcrumbs' => null])

@if (! empty($breadcrumbsJsonLd))
    <script type="application/ld+json">{!! $breadcrumbsJsonLd !!}</script>
@endif

<div class="uni_breadcrumbs">
    <div class="_container">
        <ol itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumbs flex flex-wrap items-center list-none p-0 m-0">
            @foreach ($breadcrumbs as $item)
                <li @class(['inline-flex', 'items-center', 'finish' => $item['current'] ?? false]) itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    @if (! empty($item['url']) && ! ($item['current'] ?? false))
                        <a itemprop="item" href="{{ $item['url'] }}">
                            <span itemprop="name">{{ $item['label'] }}</span>
                        </a>
                    @else
                        <span itemprop="item">
                            <span itemprop="name">{{ $item['label'] }}</span>
                        </span>
                    @endif
                    <meta itemprop="position" content="{{ $loop->iteration }}">

                    @if (! $loop->last)
                        <span class="sep" aria-hidden="true"> / </span>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</div>