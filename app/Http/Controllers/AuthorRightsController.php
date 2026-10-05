<?php

namespace App\Http\Controllers;

class AuthorRightsController extends Controller
{
    public function index()
    {
        return view('author-rights', [
            'title' => 'Авторское право',
            'description' => 'Защита авторских и смежных прав, регистрация произведений, досудебное и судебное урегулирование споров в сфере интеллектуальной собственности.',
            'breadcrumbs' => [
                ['label' => 'Главная', 'url' => route('home')],
                ['label' => 'Авторское право', 'current' => true],
            ],
        ]);
    }
}
