<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Page\Page;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function index($slug)
    {

        $page = Page::where('slug', $slug)->first();

        if ($page == null) {
            abort('404');
        }

        $template = (View::exists($page->template)) ? $page->template : 'page.page';

        return view($template, ['page' => $page]);
    }
}
