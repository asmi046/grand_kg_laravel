Проанализируй файлы:

public/page_text/policy.html
public/page_text/cookie.html
public/page_text/accept.html

Проставь данные из сидера с контактами
database/seeders/ContactSeeder.php

Если каких то данных о новом юрлице нет, Запроси их я их предоставлю.

---

В шаблоне resources/views/components/site-footer.blade.php сделай отдельный блок в самом низу и туда перенеси ссылки из меню:

[
'menu_name' => 'Меню в подвале',
'title' => 'Политика конфиденциальности',
'order' => 5,
'lnk' => '/page/politika-v-oblasti-obrabotki-personalnyx-dannyx',
],
[
'menu_name' => 'Меню в подвале',
'title' => 'Политика использования cookie',
'order' => 6,
'lnk' => '/page/o-failax-cookie',
],
[
'menu_name' => 'Меню в подвале',
'title' => 'Согласие на обработку персональных данных',
'order' => 7,
'lnk' => '/page/soglasie-na-obrabotku-personalnyx-dannyx',
],

- добавь созданную в прошлом задании страницу.

этот блок должен иметь полосу вверху отделяющую его от остальной информации в подвале. ссылки перенесенные из меню сделай шрифтом размером 12px, цвет как в остальном подвале. Ссылки отцентруй и сделай отступ менжу ними.
