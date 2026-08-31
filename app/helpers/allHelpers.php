<?php

use App\Models\Contact;
use App\Models\ContentBlock;
use App\Services\SeoServices;
use Illuminate\Database\Eloquent\Collection;

if (! function_exists('seo_data')) {
    function seo_data(?string $ogImg = null): SeoServices
    {
        return app()->makeWith(SeoServices::class, ['ogImg' => $ogImg]);
    }
}

// Месяц текстом
if (! function_exists('get_month')) {
    function get_month($date)
    {
        $monthes = [
            1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
            5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
            9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря',
        ];

        return $monthes[(date('n', strtotime($date)))];
    }
}

// Форматирование номера телефона

if (! function_exists('phone_format')) {
    function phone_format($phone)
    {
        $phone = trim($phone);

        $res = preg_replace(
            [
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',
                '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',
            ],
            [
                '$2$3$4$5',
                '$2$3$4$5',
                '$2$3$4$5',
                '$2$3$4$5',
                '$2$3$4',
                '$2$3$4',
            ],
            $phone
        );

        return $res;
    }
}

// Получение контент-блоков по группе
if (! function_exists('content_block')) {
    function content_block(string $group): Collection
    {
        return ContentBlock::group($group);
    }
}

// Получение контакта по имени
if (! function_exists('contact')) {
    function contact(string $name): ?string
    {
        return Contact::allFromCacheName()->get($name)?->value;
    }
}
