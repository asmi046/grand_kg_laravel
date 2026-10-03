<?php

namespace App\View\Components\Menues;

use App\Models\Menu\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class Puncts extends Component
{
    public array $puncts;

    /**
     * Create a new component instance.
     */
    public function __construct(public string $name = 'Главное меню')
    {
        $this->puncts = Cache::rememberForever('menu_'.$name, function () use ($name) {
            return Menu::query()
                ->where('menu_name', $name)
                ->whereNull('parent')
                ->with(['children' => fn ($query) => $query->orderBy('order')])
                ->orderBy('order')
                ->get()
                ->map(fn (Menu $item): array => [
                    'title' => $item->title,
                    'lnk' => $item->lnk,
                    'children' => $item->children
                        ->map(fn (Menu $child): array => [
                            'title' => $child->title,
                            'lnk' => $child->lnk,
                        ])
                        ->all(),
                ])
                ->all();
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menues.puncts');
    }
}