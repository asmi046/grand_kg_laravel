<?php

namespace Database\Seeders;

use App\Models\Page;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Политика в области обработки персональных данных',
                'slug' => Str::slug('Политика в области обработки персональных данных'),
                'description' => file_get_contents(public_path('page_text/policy.html')),
                'seo_title' => 'Политика в области обработки персональных данных',
                'seo_description' => 'Политика в области обработки персональных данных юридической компании в Курске.',
            ],

            [
                'title' => 'Согласие на обработку персональных данных',
                'slug' => Str::slug('Согласие на обработку персональных данных'),
                'description' => file_get_contents(public_path('page_text/accept.html')),
                'seo_title' => 'Согласие на обработку персональных данных',
                'seo_description' => 'Согласие на обработку персональных данных юридической компании в Курске.',
            ],

            [
                'title' => 'О файлах Cookie',
                'slug' => Str::slug('О файлах Cookie'),
                'description' => file_get_contents(public_path('page_text/accept.html')),
                'seo_title' => 'Подробнее о файлах cookie',
                'seo_description' => 'Информация об использовании файлов cookie на сайте юридической компании.',
            ],

            [
                'title' => 'О нас',
                'slug' => Str::slug('О нас'),
                'description' => file_get_contents(public_path('page_text/cookie.html')),
                'seo_title' => 'О компании — юридическая фирма в Курске',
                'seo_description' => 'Информация о юридической компании: опыт, команда, принципы работы и преимущества сотрудничества.',
            ],

            [
                'title' => 'Согласие на публикацию отзывов на сайте',
                'slug' => Str::slug('Согласие на публикацию отзывов на сайте'),
                'description' => file_get_contents(public_path('page_text/review.html')),
                'seo_title' => 'Согласие на публикацию отзывов на сайте',
                'seo_description' => 'Согласие на обработку персональных данных, разрешённых для распространения, и на публикацию отзыва на сайте.',
            ],
        ];

        $now = now();

        foreach ($data as $item) {
            $pageData = [
                'title' => $item['title'],
                'slug' => $item['slug'],
                'description' => $item['description'],
                'created_at' => $now,
                'updated_at' => $now,
            ];

            DB::table('pages')->upsert(
                [$pageData],
                ['slug'],
                ['title', 'description', 'updated_at']
            );

            $pageId = DB::table('pages')->where('slug', $item['slug'])->value('id');

            DB::table('seo_data')->upsert(
                [[
                    'url' => 'page/'.$item['slug'],
                    'seo_title' => $item['seo_title'],
                    'seo_description' => $item['seo_description'],
                    'page_title' => $item['title'],
                    'seoable_id' => $pageId,
                    'seoable_type' => Page::class,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]],
                ['url'],
                ['seo_title', 'seo_description', 'page_title', 'seoable_id', 'seoable_type', 'updated_at']
            );
        }
    }
}
