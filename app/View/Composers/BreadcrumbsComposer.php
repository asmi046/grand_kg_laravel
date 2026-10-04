<?php

namespace App\View\Composers;

use Illuminate\View\View;

class BreadcrumbsComposer
{
    public function compose(View $view): void
    {
        $data = $view->getData();

        $items = array_key_exists('breadcrumbs', $data) && is_array($data['breadcrumbs'])
            ? $data['breadcrumbs']
            : $this->buildItems($data);

        $view->with('breadcrumbs', $items);
        $view->with('breadcrumbsJsonLd', $this->toJsonLd($items));
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<int, array{label: string, url: ?string, current: bool}>
     */
    private function buildItems(array $data): array
    {
        $items = [
            ['label' => 'Главная', 'url' => route('home'), 'current' => false],
        ];

        if (request()->route()?->named('search-tovar')) {
            $article = $data['article'] ?? null;
            $brand = $data['brand'] ?? null;

            if (is_string($article) && $article !== '') {
                $items[] = [
                    'label' => $article,
                    'url' => route('search', ['search' => $article]),
                    'current' => false,
                ];
            }

            if (is_string($brand) && $brand !== '') {
                $items[] = ['label' => $brand, 'url' => null, 'current' => true];
            }

            return $items;
        }

        $title = $data['title'] ?? null;

        if (is_string($title) && $title !== '') {
            $items[] = ['label' => $title, 'url' => null, 'current' => true];
        }

        return $items;
    }

    /**
     * @param  array<int, array{label: string, url: ?string, current: bool}>  $items
     */
    private function toJsonLd(array $items): string
    {
        $list = [];

        foreach ($items as $i => $item) {
            $entry = [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'name' => $item['label'],
            ];

            if (! empty($item['url'])) {
                $entry['item'] = $item['url'];
            }

            $list[] = $entry;
        }

        return json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $list,
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?: '';
    }
}
