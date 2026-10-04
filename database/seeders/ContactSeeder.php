<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert(
            [
                [
                    'name' => 'company_name',
                    'title' => 'Название компании',
                    'value' => 'ООО «Консалтинговая группа "Гранд"»',
                ],

                [
                    'name' => 'phone',
                    'title' => 'Телефон',
                    'value' => '8 (910) 217-19-19',
                ],

                [
                    'name' => 'phone_2',
                    'title' => 'Телефон',
                    'value' => '8 (951) 076-18-19',
                ],

                [
                    'name' => 'email',
                    'title' => 'E-mail',
                    'value' => 'info@grand-kg.ru',
                ],

                [
                    'name' => 'address',
                    'title' => 'Адрес',
                    'value' => 'г. Курск, ул. Павлуновского, д.48а',
                ],

                [
                    'name' => 'inn',
                    'title' => 'ИНН',
                    'value' => '4632103720',
                ],

                [
                    'name' => 'kpp',
                    'title' => 'КПП',
                    'value' => '463201001',
                ],

                [
                    'name' => 'ogrn',
                    'title' => 'ОГРН',
                    'value' => '1094632001056',
                ],

                [
                    'name' => 'rs',
                    'title' => 'Р/С',
                    'value' => '40702810210000971417',
                ],

                [
                    'name' => 'bank',
                    'title' => 'Банк',
                    'value' => 'АО «ТБанк»',
                ],

                [
                    'name' => 'bik',
                    'title' => 'БИК',
                    'value' => '044525974',
                ],

                [
                    'name' => 'ks',
                    'title' => 'Корр. счёт',
                    'value' => '30101810145250000974',
                ],

                [
                    'name' => 'geo',
                    'title' => 'Гео-координаты',
                    'value' => '51.727700, 36.164485',
                ],

                [
                    'name' => 'telegram',
                    'title' => 'Telegram',
                    'value' => 'https://t.me/A_Grokhotov',
                ],

                [
                    'name' => 'max',
                    'title' => 'Max',
                    'value' => 'https://max.ru/u/f9LHodD0cOKmN3_hBOi8AXZlgUBF5xA9QfhrJQsM-ZzOUJCEmeYA7u0Beec',
                ],

            ]
        );
    }
}
