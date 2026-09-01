<header class="site-header">
    <div class="container header-top">
        <a class="brand" href="{{ route('home') }}" aria-label="Грандъ — на главную">
            <img src="{{ asset('img/logo.svg') }}" alt="Грандъ" width="200" height="74" decoding="async" />
        </a>

        <div class="header-meta">
            <nav class="site-nav" aria-label="Основная навигация">
                <ul>
                    <li><a href="#hero">Главная</a></li>
                    <li><a href="#services">Услуги</a></li>
                    <li><a href="/about">О компании</a></li>
                    <li><a href="/prices">Прайс услуг</a></li>
                    <li><a href="/contacts">Контакты</a></li>
                </ul>
            </nav>

            <a class="header-phone" href="tel:{{ contact('phone') }}">{{ contact('phone') }}</a>

            <x-header-social />
        </div>
    </div>
</header>
