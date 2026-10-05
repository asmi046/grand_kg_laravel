<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @if (isset($og_img))
        @header_seo_with_img($og_img)
    @else
        @header_seo
    @endif

    <link rel="icon" type="image/png" href="{{ asset('/img/favicons/icon256.png') }}" sizes="256x256">
    <link rel="icon" type="image/png" href="{{ asset('/img/favicons/icon128.png') }}" sizes="128x128">
    <link rel="icon" type="image/png" href="{{ asset('/img/favicons/icon64.png') }}" sizes="64x64">
    <link rel="icon" type="image/png" href="{{ asset('/img/favicons/icon32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('/img/favicons/icon16.png') }}" sizes="16x16">
    <link rel="icon" type="image/svg" href="{{ asset('/img/favicons/fav.svg') }}" sizes="any">

    <meta name="_token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js', 'public/scss/main.scss'])

    <script>
        window.Laravel = {
            assetUrl: '{{ asset('') }}',
            storageUrl: '{{ Storage::url('') }}'
        };
    </script>
</head>

<body>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
                k, a)
        })(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');

        ym(27844104, 'init', {
            webvisor: true,
            clickmap: true,
            referrer: document.referrer,
            url: location.href,
            accurateTrackBounce: true,
            trackLinks: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/27844104" style="position:absolute; left:-9999px;" alt="" />
        </div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <x-svg-sprite />
    <x-site-header />
    <main id="main">
        @yield('main')
    </main>

    <x-site-footer />
</body>

<x-mobile-menu>
    <x-slot:header>
        <a class="mm-menu__brand" href="{{ route('home') }}" aria-label="Грандъ — на главную">
            <img src="{{ asset('img/logo.svg') }}" alt="Грандъ" width="150" height="55" decoding="async" />
        </a>
    </x-slot:header>

    <x-slot:contacts>
        <x-menues.puncts />
    </x-slot:contacts>

    <x-slot:footer>
        <div class="mm-menu__contacts">
            <a href="tel:{{ preg_replace('/[^\d+]/', '', (string) contact('phone')) }}"
                class="mm-menu__contact mm-menu__contact--phone">{{ contact('phone') }}</a>
            <a href="mailto:{{ contact('email') }}"
                class="mm-menu__contact mm-menu__contact--email">{{ contact('email') }}</a>
        </div>
    </x-slot:footer>
</x-mobile-menu>

<div class="modal_win" id="modal_app">
    <cookies-warning privacy-policy-link="{{ route('page', 'politika-v-oblasti-obrabotki-personalnyx-dannyx') }}"
        cookies-info-link="{{ route('page', 'o-failax-cookie') }}"
        privacy-policy-accept-link="{{ route('page', 'soglasie-na-obrabotku-personalnyx-dannyx') }}" />
</div>

</html>
