<header class="site-header">
    <div class="container header-top">
        <a class="brand" href="{{ route('home') }}" aria-label="Грандъ — на главную">
            <img class="brand__img" src="{{ asset('img/logo.svg') }}" alt="Грандъ" width="200" height="74" decoding="async" />
            <img class="brand__img brand__img--autor" src="{{ asset('img/grand_ap.svg') }}" alt="Грандъ" width="200" height="74" decoding="async" hidden />
        </a>

        <div class="header-meta">
            <x-menues.puncts />

            <a class="header-phone" href="tel:{{ contact('phone') }}">{{ contact('phone') }}</a>

            <x-header-social />
        </div>
    </div>
</header>
