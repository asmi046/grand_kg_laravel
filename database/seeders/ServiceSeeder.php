<?php

namespace Database\Seeders;

use App\Models\Service;
use DB;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Арбитражные споры',
                'slug' => 'arbitrazhnye-spory',
                'short_description' => 'Решение конфликтов между хозяйствующими субъектами в сфере предпринимательской деятельности: возврат долгов, защита интересов и иные споры.',
                'icon' => 'law-49',
                'order' => 1,
                'template' => 'arbitragnoe-pravo',
                'seo_title' => 'Арбитражные споры — представительство в арбитражном суде в Курске',
                'seo_description' => 'Защита интересов в арбитражных спорах: взыскание задолженности, корпоративные и хозяйственные конфликты, сопровождение дел в арбитражном суде.',
            ],
            [
                'title' => 'Банкротство юридических лиц',
                'slug' => 'bankrotstvo-juridicheskih-lic',
                'short_description' => 'Защищаем бизнес на всех этапах процедуры — от предбанкротной диагностики до завершения конкурсного производства.',
                'icon' => 'law-78',
                'order' => 2,
                'template' => 'bankrotstvo-main',
                'seo_title' => 'Банкротство юридических лиц — сопровождение процедур банкротства в Курске',
                'seo_description' => 'Юридическое сопровождение банкротства юридических лиц: наблюдение, финансовое оздоровление, внешнее управление, конкурсное производство.',
            ],
            [
                'title' => 'Налоговые споры',
                'slug' => 'nalogovye-spory',
                'short_description' => 'Оптимизация налогов, помощь при проверках, налоговые льготы, вопросы НДС и защита интересов в налоговых органах.',
                'icon' => 'law-51',
                'order' => 3,
                'template' => 'nalogovie-spori',
                'seo_title' => 'Налоговые споры — защита интересов в налоговых органах в Курске',
                'seo_description' => 'Сопровождение налоговых проверок, оптимизация налогов, оспаривание решений налоговых органов, защита интересов в суде.',
            ],
            [
                'title' => 'Сопровождение бизнеса',
                'slug' => 'kompleksnoe-soprovozhdenie-biznesa',
                'short_description' => 'Юридическая поддержка стартапов, действующего бизнеса и крупных проектов, аутсорсинг юристов и работа с проверками госорганов.',
                'icon' => 'law-50',
                'order' => 4,
                'template' => 'soprovogdenie-biznesa',
                'seo_title' => 'Комплексное сопровождение бизнеса — юридический аутсорсинг в Курске',
                'seo_description' => 'Юридическое сопровождение бизнеса на постоянной основе: договорная работа, претензионно-исковая деятельность, консультации и защита при проверках.',
            ],
            [
                'title' => 'Корпоративное право',
                'slug' => 'korporativnoe-pravo',
                'short_description' => 'Регистрация, реорганизация и ликвидация юридических лиц, разрешение корпоративных споров и сопровождение текущей работы компании.',
                'icon' => 'law-02',
                'order' => 5,
                'template' => 'korporativnoe-pravo',
                'seo_title' => 'Корпоративное право — регистрация, реорганизация и сопровождение компаний',
                'seo_description' => 'Услуги в сфере корпоративного права: регистрация и ликвидация юридических лиц, корпоративные споры, сопровождение текущей деятельности.',
            ],
            [
                'title' => 'Интеллектуальная собственность',
                'slug' => 'intellektualnaja-sobstvennost',
                'short_description' => 'Охрана объектов авторского и патентного права, регистрация, продление и аннулирование действия товарных знаков.',
                'icon' => 'law-23',
                'order' => 6,
                'template' => null,
                'seo_title' => 'Интеллектуальная собственность — защита авторских и патентных прав',
                'seo_description' => 'Регистрация и защита объектов интеллектуальной собственности: товарные знаки, авторские и патентные права, споры в сфере IP.',
            ],
            [
                'title' => 'Сопровождение сделок',
                'slug' => 'soprovozhdenie-sdelok',
                'short_description' => 'Проведение переговоров, оценка управленческих и налоговых рисков, подготовка документов и закрытие сделки.',
                'icon' => 'law-24',
                'order' => 7,
                'template' => null,
                'seo_title' => 'Сопровождение сделок — правовая поддержка на всех этапах',
                'seo_description' => 'Юридическое сопровождение сделок: подготовка документов, оценка рисков, участие в переговорах и закрытие сделки.',
            ],
            [
                'title' => 'Кадастровые вопросы',
                'slug' => 'osparivanie-kadastrovoj-stoimosti',
                'short_description' => 'Работы по снижению кадастровой стоимости земельных участков и объектов капитального строительства.',
                'icon' => 'law-13',
                'order' => 8,
                'template' => null,
                'seo_title' => 'Оспаривание кадастровой стоимости — снижение кадастровой стоимости в Курске',
                'seo_description' => 'Снижение кадастровой стоимости земельных участков и объектов капитального строительства, оспаривание результатов кадастровой оценки.',
            ],
        ];

        $now = now();

        foreach ($services as $service) {
            $seo = [
                'seo_title' => $service['seo_title'],
                'seo_description' => $service['seo_description'],
            ];

            $serviceData = [
                'title' => $service['title'],
                'slug' => $service['slug'],
                'short_description' => $service['short_description'],
                'icon' => $service['icon'],
                'order' => $service['order'],
                'template' => $service['template'],
                'created_at' => $now,
                'updated_at' => $now,
            ];

            DB::table('services')->upsert(
                [$serviceData],
                ['slug'],
                ['title', 'short_description', 'icon', 'order', 'template', 'updated_at']
            );

            $serviceId = DB::table('services')->where('slug', $service['slug'])->value('id');

            DB::table('seo_data')->upsert(
                [[
                    'url' => 'services/'.$service['slug'],
                    'seo_title' => $seo['seo_title'],
                    'seo_description' => $seo['seo_description'],
                    'page_title' => $service['title'],
                    'seoable_id' => $serviceId,
                    'seoable_type' => Service::class,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]],
                ['url'],
                ['seo_title', 'seo_description', 'page_title', 'seoable_id', 'seoable_type', 'updated_at']
            );
        }
    }
}
