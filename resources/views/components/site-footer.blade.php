<footer class="site-footer" id="contacts">
    <div class="container footer-grid">
        <div class="footer-brand-col">
            <a class="brand footer-brand" href="{{ route('home') }}" aria-label="Грандъ — на главную">
                <img src="{{ asset('img/logo-white.svg') }}" alt="Грандъ" width="160" height="59" loading="lazy"
                    decoding="async" />
            </a>
            <p class="footer-copy">Эффективные правовые решения для бизнеса в Курске.</p>
        </div>

        <nav class="footer-col" aria-label="Навигация в подвале">
            <h2 class="footer-title">Навигация</h2>
            <x-menues.puncts name="Меню в подвале" />
        </nav>

        <nav class="footer-col" aria-label="Услуги">
            <h2 class="footer-title">Услуги</h2>
            <x-menues.puncts name="Услуги" />
        </nav>

        <address class="footer-col footer-contact">
            <h2 class="footer-title">Контакты</h2>
            <p>Курск, ул. Павлуновского, д. 48а</p>
            <p><a href="tel:+79102171919">8 (910) 217-19-19</a></p>
            <p><a href="tel:+79510761819">8 (951) 076-18-19</a></p>
            <p><a href="mailto:info@grand-kg.ru">info@grand-kg.ru</a></p>
        </address>
    </div>

    <div class="container footer-bottom">
        <p>Все права защищены © 2022</p>
        <p>ООО «Консалтинговая группа Грандъ»</p>
    </div>

    <div class="container footer-legal">
        <ul class="footer-legal__list">
            <li><a href="/page/politika-v-oblasti-obrabotki-personalnyx-dannyx">Политика конфиденциальности</a></li>
            <li><a href="/page/o-failax-cookie">Политика использования cookie</a></li>
            <li><a href="/page/soglasie-na-obrabotku-personalnyx-dannyx">Согласие на обработку персональных данных</a>
            </li>
            <li><a href="/page/soglasie-na-publikaciiu-otzyvov-na-saite">Согласие на публикацию отзывов на сайте</a>
            </li>
        </ul>
    </div>
</footer>
