<?php

namespace App\Services;

use App\Models\SeoData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SeoServices
{
    public $seo_data;

    public $og_img;

    public $is_404;

    public function __construct(?string $ogImg = null)
    {
        $this->is_404 = (bool) request()->attributes->get('is_404', false);
        $this->seo_data = $this->get_data_by_url();
        $this->og_img = $ogImg ?: asset('img/og_img_may.webp');
    }

    public function __toString()
    {

        $seo_title = $this->seo_data['seo_title'] ?? config('asmiseo.default_seo_title');
        $seo_title .= config('asmiseo.concat_title_postfix') ? ' - '.config('asmiseo.title_postfix') : '';
        $seo_description = $this->seo_data['seo_description'] ?? config('asmiseo.default_seo_description');

        if ($this->is_404) {
            $seo_title = config('asmiseo.seo_title_404');
            $seo_description = config('asmiseo.seo_description_404');
        }

        if ($this->seo_data) {
            $this->og_img = ($this->seo_data['img']) ? Storage::url($this->seo_data['img']) : $this->og_img;
        }

        $result = '<title>'.$seo_title.'</title>'."\n\r";
        $result .= '<meta name="description" content="'.$seo_description.'">'."\n\r";
        $result .= '<meta property="og:locale" content="ru_RU" />'."\n\r";
        $result .= '<meta property="og:type" content="website" />'."\n\r";
        $result .= '<meta property="og:title" content="'.$seo_title.'" />'."\n\r";
        $result .= '<meta property="og:description" content="'.$seo_description.'" />'."\n\r";
        $result .= '<meta property="og:url" content="'.\Request::url().'" />'."\n\r";
        $result .= '<meta property="og:site_name" content="'.config('asmiseo.title_postfix').'" />'."\n\r";
        $result .= '<meta property="og:image" content="'.($this->og_img).'" />'."\n\r";
        $result .= '<meta property="og:image:type" content="image/webp" />'."\n\r";
        $result .= '<meta name="twitter:card" content="summary_large_image" />'."\n\r";
        // $result .= $this->seo_data->img."\n\r";

        return $result;
    }

    public function get_data_by_url()
    {
        if ($this->is_404) {
            return null;
        }

        $url = \Request::path();
        $url_data = cache()->rememberForever(
            'seo_'.Str::slug($url),
            function (): ?array {
                $url = \Request::path();

                return SeoData::query()
                    ->where('url', $url)
                    ->first(['seo_title', 'seo_description', 'img'])
                    ?->toArray();
            }
        );

        return $url_data;
    }
}
