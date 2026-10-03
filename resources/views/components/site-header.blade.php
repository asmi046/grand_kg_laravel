<header class="site-header">
    <div class="container header-top">
        <a class="brand" href="{{ route('home') }}" aria-label="Грандъ — на главную">
            <img src="{{ asset('img/logo.svg') }}" alt="Грандъ" width="200" height="74" decoding="async" />
        </a>

        <div class="header-meta">
            <x-menues.puncts />

            <a class="header-phone" href="tel:{{ contact('phone') }}">{{ contact('phone') }}</a>

            <x-header-social />
        </div>
    </div>
</header>
