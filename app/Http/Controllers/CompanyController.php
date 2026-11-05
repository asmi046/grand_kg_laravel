<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Данные компании для модального окна портфолио.
     */
    public function show(Company $company)
    {
        abort_unless($company->is_published, 404);

        return response()->json([
            'title' => $company->title,
            'img' => $company->img_url,
            'region' => $company->region,
            'years' => $company->years_label,
            'url' => $company->url,
            'is_own_project' => $company->is_own_project,
            'sections' => $company->sections
                ->map(fn ($section) => [
                    'title' => $section->title,
                    'url' => $section->url,
                ])
                ->values()
                ->all(),
            'subsections' => $company->subsections
                ->map(fn ($subsection) => [
                    'title' => $subsection->title,
                    'url' => $subsection->url,
                ])
                ->values()
                ->all(),
        ]);
    }
}
