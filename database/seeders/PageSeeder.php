<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
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
            ],

            [
                'title' => 'Согласие на обработку персональных данных',
                'slug' => Str::slug('Согласие на обработку персональных данных'),
                'description' => file_get_contents(public_path('page_text/accept.html')),
            ],

            [
                'title' => 'О файлах Cookie',
                'slug' => Str::slug('О файлах Cookie'),
                'description' => file_get_contents(public_path('page_text/accept.html')),
            ],

            [
                'title' => 'О нас',
                'slug' => Str::slug('О нас'),
                'description' => file_get_contents(public_path('page_text/cookie.html')),
            ],
        ];

        foreach ($data as $item) {
            // Storage::disk('public')->put("main_bnr.webp", file_get_contents(public_path('img/main_bnr.webp')), 'public');
            $pageId = DB::table('pages')->insertGetId($item);

            // DB::table("seo_data")->insert(
            //     [
            //         'url' => 'page/'.$item['slug'],
            //         'seo_title' => $item['title'],
            //         'seo_description' => $item['title'],
            //         'seoable_id' => $pageId,
            //         'seoable_type' => "App\Models\Page"
            //     ]
            // );
        }

    }
}
