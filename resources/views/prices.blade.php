@extends('layouts.all')

@section('main')
    <x-page-header title="Прайс" />
    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main title="Прайс"></x-breadcrumbs.main>
        </div>
    </section>

    <section class="prices_section">
        <div class="container">
            <table class="price-table">
                <thead>
                    <tr>
                        <th>Наименование услуги</th>
                        <th>Стоимость</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($priceOffers as $index => $offer)
                        <tr class="{{ $index % 2 === 0 ? 'even' : 'odd' }}">
                            <td>{{ $offer->title }}</td>
                            <td>{{ number_format($offer->price, 0, ',', ' ') }} руб.</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
