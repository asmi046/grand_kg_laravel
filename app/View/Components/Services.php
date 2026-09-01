<?php

namespace App\View\Components;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Services extends Component
{
    public $services;

    public function __construct()
    {
        $this->services = Service::orderBy('order')->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.services');
    }
}
