<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services');
    }

    public function show(string $slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        $view = $service->template
            ? 'templates.services.'.$service->template
            : 'service';

        return view($view, [
            'service' => $service,
            'title' => $service->title,
            'description' => $service->short_description,
        ]);
    }
}
