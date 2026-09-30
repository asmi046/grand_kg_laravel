@extends('layouts.all')

@section('main')
    <x-page-header title="Контакты" />
    <section class="breadcrumbs_section">
        <div class="container">
            <x-breadcrumbs.main title="Контакты"></x-breadcrumbs.main>
        </div>
    </section>

    <section class="contacts_section section">
        <div class="container">
            <div class="contacts_grid">
                <div class="contacts_info">
                    @if ($contacts['company_name'])
                        <div class="contact_item">
                            <span class="contact_label">Название компании:</span>
                            <span class="contact_value">{{ $contacts['company_name'] }}</span>
                        </div>
                    @endif
                    @if ($contacts['address'])
                        <div class="contact_item">
                            <span class="contact_label">Адрес:</span>
                            <span class="contact_value">{{ $contacts['address'] }}</span>
                        </div>
                    @endif
                    @if ($contacts['inn'])
                        <div class="contact_item">
                            <span class="contact_label">ИНН:</span>
                            <span class="contact_value">{{ $contacts['inn'] }}</span>
                        </div>
                    @endif
                    @if ($contacts['ogrn'])
                        <div class="contact_item">
                            <span class="contact_label">ОГРН:</span>
                            <span class="contact_value">{{ $contacts['ogrn'] }}</span>
                        </div>
                    @endif
                    @if ($contacts['phone'])
                        <div class="contact_item">
                            <span class="contact_label">Телефон:</span>
                            <a href="tel:{{ $contacts['phone'] }}" class="contact_value">{{ $contacts['phone'] }}</a>
                        </div>
                    @endif
                    @if ($contacts['phone_2'])
                        <div class="contact_item">
                            <span class="contact_label">Доп. телефон:</span>
                            <a href="tel:{{ $contacts['phone_2'] }}" class="contact_value">{{ $contacts['phone_2'] }}</a>
                        </div>
                    @endif
                    @if ($contacts['email'])
                        <div class="contact_item">
                            <span class="contact_label">Email:</span>
                            <a href="mailto:{{ $contacts['email'] }}" class="contact_value">{{ $contacts['email'] }}</a>
                        </div>
                    @endif

                    <div class="contacts_social">
                        <x-header-social />
                    </div>
                </div>
                <div class="contacts_map">
                    <x-map.map-in-page name="Денталика" :geo="$contacts['geo']" :adres="$contacts['address']" :phone="$contacts['phone']"></x-map.map-in-page>
                </div>
            </div>
        </div>
    </section>
@endsection
