Заполни файл database/seeders/MenuSeeder.php

Для главного меню используй меню из файла resources/views/components/site-header.blade.php

Сделай меню в подвале используя меню из файла resources/views/components/site-footer.blade.php (навигация)
Сделай меню услуги в подвале используя меню из файла resources/views/components/site-footer.blade.php (Услуги)
___

В моей реализации меню есть проболема, я храню в кеше коллекцию а новые версии ларавель не дают этого делать из соображений безопасности. Давай переделаем логику под хранение в кеше массива.
