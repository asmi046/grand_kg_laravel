<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class SeoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'url' => '/',
                'seo_title' => 'Юридические услуги для бизнеса в Курске',
                'seo_description' => 'Юридические услуги для бизнеса в городе Курск. Все виды юридических услуг',
                'page_title' => '',
            ],
            [
                'url' => 'services',
                'seo_title' => 'Юридические услуги в Курске — полный перечень направлений',
                'seo_description' => 'Все юридические услуги компании: арбитражные споры, банкротство, налоговые споры, сопровождение бизнеса, корпоративное право и другие направления.',
                'page_title' => 'Услуги',
            ],
            [
                'url' => 'about',
                'seo_title' => 'О компании — юридическая фирма в Курске',
                'seo_description' => 'Информация о юридической компании: опыт, команда, принципы работы и преимущества сотрудничества.',
                'page_title' => 'О нас',
            ],
            [
                'url' => 'prices',
                'seo_title' => 'Цены на юридические услуги в Курске',
                'seo_description' => 'Стоимость юридических услуг компании: арбитраж, банкротство, налоговые споры, сопровождение бизнеса и других направлений.',
                'page_title' => 'Цены',
            ],
            [
                'url' => 'contacts',
                'seo_title' => 'Контакты юридической компании в Курске',
                'seo_description' => 'Контактная информация юридической компании: адрес офиса, телефоны, электронная почта и схема проезда.',
                'page_title' => 'Контакты',
            ],
            [
                'url' => 'page/politika-v-oblasti-obrabotki-personalnyx-dannyx',
                'seo_title' => 'Политика в области обработки персональных данных',
                'seo_description' => 'Политика в области обработки персональных данных',
                'page_title' => '',
            ],
            [
                'url' => 'page/soglasie-na-obrabotku-personalnyx-dannyx',
                'seo_title' => 'Согласие на обработку персональных данных',
                'seo_description' => 'Согласие на обработку персональных данных',
                'page_title' => '',
            ],
            [
                'url' => 'page/o-failax-cookie',
                'seo_title' => 'Подробнее о файлах cookie',
                'seo_description' => 'Подробнее о файлах cookie',
                'page_title' => '',
            ],
        ];

        DB::table('seo_data')->upsert(
            $data,
            ['url'],
            ['seo_title', 'seo_description', 'page_title', 'updated_at']
        );
    }
}
