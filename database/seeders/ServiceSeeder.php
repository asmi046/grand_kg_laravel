<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'title' => 'Арбитражные споры',
                'slug' => 'arbitrazhnye-spory',
                'short_description' => 'Решение конфликтов между хозяйствующими субъектами в сфере предпринимательской деятельности: возврат долгов, защита интересов и иные споры.',
                'icon' => 'law-49',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Процедура банкротства',
                'slug' => 'soprovozhdenie-procedur-bankrotstva',
                'short_description' => 'Ликвидация бизнеса с долгами, защита при субсидиарной ответственности директора, проведение торгов и сопровождение процедур.',
                'icon' => 'law-78',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Налоговые споры',
                'slug' => 'nalogovye-spory',
                'short_description' => 'Оптимизация налогов, помощь при проверках, налоговые льготы, вопросы НДС и защита интересов в налоговых органах.',
                'icon' => 'law-51',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Сопровождение бизнеса',
                'slug' => 'kompleksnoe-soprovozhdenie-biznesa',
                'short_description' => 'Юридическая поддержка стартапов, действующего бизнеса и крупных проектов, аутсорсинг юристов и работа с проверками госорганов.',
                'icon' => 'law-50',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Корпоративное право',
                'slug' => 'korporativnoe-pravo',
                'short_description' => 'Регистрация, реорганизация и ликвидация юридических лиц, разрешение корпоративных споров и сопровождение текущей работы компании.',
                'icon' => 'law-02',
                'order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Интеллектуальная собственность',
                'slug' => 'intellektualnaja-sobstvennost',
                'short_description' => 'Охрана объектов авторского и патентного права, регистрация, продление и аннулирование действия товарных знаков.',
                'icon' => 'law-23',
                'order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Сопровождение сделок',
                'slug' => 'soprovozhdenie-sdelok',
                'short_description' => 'Проведение переговоров, оценка управленческих и налоговых рисков, подготовка документов и закрытие сделки.',
                'icon' => 'law-24',
                'order' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Кадастровые вопросы',
                'slug' => 'osparivanie-kadastrovoj-stoimosti',
                'short_description' => 'Работы по снижению кадастровой стоимости земельных участков и объектов капитального строительства.',
                'icon' => 'law-13',
                'order' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
