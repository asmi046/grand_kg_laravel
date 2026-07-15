<?php

return [
    'default_seo_title' => env('DEFAULT_SEO_TITLE', 'Страница'),
    'default_seo_description' => env('DEFAULT_SEO_DESCRIPTION', 'Страница'),
    'default_page_title' => env('DEFAULT_PAGE_TITLE', 'Страница'),
    'concat_title_postfix' => env('CONCAT_TITLE_POSTFIX', true),
    'title_postfix' => env('TITLE_POSTFIX', 'КГ «ГрандЪ»'),
    'seo_title_404' => env('SEO_TITLE_404', 'Страница не найдена 404'),
    'seo_description_404' => env('SEO_DESCRIPTION_404', 'Страница не найдена, возможно, она была удалена или перемещена. Пожалуйста, проверьте URL-адрес и попробуйте снова.'),
];
