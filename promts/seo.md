В сидер database/seeders/SeoDataSeeder.php нужно добавить записи для путей

/services
/about
/prices
/contacts

Так де нужно добавить заполнение seo полей для услуг в сидереы database/seeders/ServiceSeeder.php и database/seeders/PageSeeder.php. Таким образом чтобы при повторном вызове сидера данные в таблицу не просто добавлялись а обновлялись, ключем проверки пусть выступает поле url
