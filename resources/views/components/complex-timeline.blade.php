@props([
    'eyebrow' => 'Комплекс',
    'title' => '',
    'section' => 'complex',
    'stages' => [],
])

<section class="{{ $section }} section" id="{{ $section }}">
    <div class="container">
        <div class="section-heading">
            <p class="eyebrow">{{ $eyebrow }}</p>
            <h2>{{ $title }}</h2>
        </div>
        <ol class="complex-timeline">
            @foreach($stages as $index => $stage)
                <li class="complex-stage">
                    <span class="complex-stage-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="complex-stage-body">
                        <h3>{{ $stage['title'] }}</h3>

                        @if(!empty($stage['text']))
                            <p class="complex-stage-note">{{ $stage['text'] }}</p>
                        @endif

                        @if(!empty($stage['items']))
                            <p class="complex-stage-label">{{ $stage['items_label'] ?? 'Что делаем' }}</p>
                            <ul class="complex-stage-list">
                                @foreach($stage['items'] as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @foreach($stage['notes'] ?? [] as $note)
                            <p class="complex-stage-label">{{ $note['label'] }}</p>
                            <p class="complex-stage-note">{{ $note['text'] }}</p>
                        @endforeach
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>
