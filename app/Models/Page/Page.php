<?php

namespace App\Models\Page;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'parent',
        'template',
        'img',
        'description',
        'images',
        'files',
    ];

    protected $casts = [
        'images' => 'array',
        'files' => 'array',
    ];

    public function parent_page()
    {
        return $this->BelongsTo(Page::class, 'parent');
    }

    public function seoData()
    {
        return $this->morphOne(SeoData::class, 'seoable');
    }

    public function setSlugAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['slug'] = Str::slug($this->title);
        } else {
            $this->attributes['slug'] = $value;
        }
    }
}
