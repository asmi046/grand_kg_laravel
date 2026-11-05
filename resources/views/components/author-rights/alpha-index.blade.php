@props([
    'companies' => null,
    'letters' => null,
])

@php
    $letters = $letters ?: \App\Models\Company::LETTERS;
    $labels = \App\Models\Company::LETTER_LABELS;

    // Раскладываем компании по буквам в порядке алфавита.
    $groups = collect($companies ?? [])
        ->filter(fn ($company) => in_array($company->letter, $letters, true))
        ->sortBy(fn ($company) => array_search($company->letter, $letters, true))
        ->groupBy('letter');
@endphp

@if($groups->isNotEmpty())
    <nav class="alpha-index-nav" aria-label="Алфавитный указатель портфолио">
        @foreach($groups as $letter => $items)
            <a class="alpha-index-nav__link" href="#portfolio-{{ $loop->index }}">{{ $labels[$letter] ?? $letter }}</a>
        @endforeach
    </nav>

    <div class="alpha-index">
        @foreach($groups as $letter => $items)
            <section class="alpha-index__group" id="portfolio-{{ $loop->index }}">
                <div class="alpha-index__letter" aria-hidden="true">{{ $labels[$letter] ?? $letter }}</div>

                <ul class="alpha-index__companies">
                    @foreach($items as $company)
                        <li class="alpha-index__company">
                            <a class="alpha-index__company-link" href="{{ route('company.show', $company) }}"
                                data-company-url="{{ route('company.show', $company) }}"
                                data-company-id="{{ $company->id }}">{{ $company->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </section>
        @endforeach
    </div>
@endif
