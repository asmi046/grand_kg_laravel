<?php

namespace App\Http\Controllers;

use App\Models\AuthorSection;
use App\Models\AuthorSubsection;
use App\Models\Company;
use Illuminate\Support\Str;

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
            'sections' => AuthorSection::query()->orderBy('order')->orderBy('id')->get(),
            'companies' => Company::query()->published()->orderBy('title')->get(),
        ]);
    }

    public function show(AuthorSection $section)
    {
        return view('author-section', [
            'section' => $section,
            'title' => $section->title,
            'description' => Str::limit($section->description, 160),
            'breadcrumbs' => [
                ['label' => 'Главная', 'url' => route('home')],
                ['label' => 'Авторское право', 'url' => route('author-rights.index')],
                ['label' => $section->title, 'current' => true],
            ],
            'companies' => $section->companies()
                ->published()
                ->orderBy('letter')
                ->orderBy('order')
                ->get(),
            'subsections' => $section->subsections()->get(),
        ]);
    }

    /**
     * Страница подраздела раздела авторского права.
     */
    public function subsection(AuthorSection $section, string $subsection)
    {
        $authorSubsection = AuthorSubsection::query()
            ->where('slug', $section->slug.'/'.$subsection)
            ->firstOrFail();

        return view('author-subsection', [
            'section' => $section,
            'subsection' => $authorSubsection,
            'title' => $authorSubsection->title,
            'description' => Str::limit($authorSubsection->description, 160),
            'breadcrumbs' => [
                ['label' => 'Главная', 'url' => route('home')],
                ['label' => 'Авторское право', 'url' => route('author-rights.index')],
                ['label' => $section->title, 'url' => route('author-rights.show', $section)],
                ['label' => $authorSubsection->title, 'current' => true],
            ],
            'companies' => $authorSubsection->companies()
                ->published()
                ->orderBy('letter')
                ->orderBy('order')
                ->get(),
        ]);
    }
}
