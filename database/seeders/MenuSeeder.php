<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mainMenu = [
            [
                'menu_name' => 'Главное меню',
                'title' => 'Главная',
                'order' => 1,
                'lnk' => '/#hero',
            ],
            [
                'menu_name' => 'Главное меню',
                'title' => 'Услуги',
                'order' => 2,
                'lnk' => '/services',
            ],
            [
                'menu_name' => 'Главное меню',
                'title' => 'О компании',
                'order' => 3,
                'lnk' => '/about',
            ],
            [
                'menu_name' => 'Главное меню',
                'title' => 'Прайс услуг',
                'order' => 4,
                'lnk' => '/prices',
            ],
            [
                'menu_name' => 'Главное меню',
                'title' => 'Контакты',
                'order' => 5,
                'lnk' => '/contacts',
            ],
        ];

        DB::table('menus')->insert($mainMenu);

        $footerNav = [
            [
                'menu_name' => 'Меню в подвале',
                'title' => 'Главная',
                'order' => 1,
                'lnk' => '/#hero',
            ],
            [
                'menu_name' => 'Меню в подвале',
                'title' => 'О компании',
                'order' => 2,
                'lnk' => '/#about',
            ],
            [
                'menu_name' => 'Меню в подвале',
                'title' => 'Прайс услуг',
                'order' => 3,
                'lnk' => '/prices',
            ],
            [
                'menu_name' => 'Меню в подвале',
                'title' => 'Контакты',
                'order' => 4,
                'lnk' => '/#contacts',
            ],
        ];

        DB::table('menus')->insert($footerNav);

        $footerServices = [
            [
                'menu_name' => 'Услуги',
                'title' => 'Арбитражные споры',
                'order' => 1,
                'lnk' => '/services/arbitrazhnye-spory',
            ],
            [
                'menu_name' => 'Услуги',
                'title' => 'Процедура банкротства',
                'order' => 2,
                'lnk' => '/services/soprovozhdenie-procedur-bankrotstva',
            ],
            [
                'menu_name' => 'Услуги',
                'title' => 'Налоговые споры',
                'order' => 3,
                'lnk' => '/services/nalogovye-spory',
            ],
            [
                'menu_name' => 'Услуги',
                'title' => 'Сопровождение бизнеса',
                'order' => 4,
                'lnk' => '/services/kompleksnoe-soprovozhdenie-biznesa',
            ],
            [
                'menu_name' => 'Услуги',
                'title' => 'Корпоративное право',
                'order' => 5,
                'lnk' => '/services/korporativnoe-pravo',
            ],
            [
                'menu_name' => 'Услуги',
                'title' => 'Интеллектуальная собственность',
                'order' => 6,
                'lnk' => '/services/intellektualnaja-sobstvennost',
            ],
            [
                'menu_name' => 'Услуги',
                'title' => 'Сопровождение сделок',
                'order' => 7,
                'lnk' => '/services/soprovozhdenie-sdelok',
            ],
            [
                'menu_name' => 'Услуги',
                'title' => 'Кадастровые вопросы',
                'order' => 8,
                'lnk' => '/services/osparivanie-kadastrovoj-stoimosti',
            ],
        ];

        DB::table('menus')->insert($footerServices);
    }
}
