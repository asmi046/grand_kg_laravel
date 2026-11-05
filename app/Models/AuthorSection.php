<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthorSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'number',
        'slug',
        'description',
        'img',
        'icon',
        'order',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $section): void {
            if (blank($section->slug)) {
                $section->slug = $section->generateSlug($section->title);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getUrlAttribute(): string
    {
        return url('/avtor/'.$this->slug);
    }

    public function subsections(): HasMany
    {
        return $this->hasMany(AuthorSubsection::class)->orderBy('order');
    }

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_author_section');
    }

    public function getImgUrlAttribute(): ?string
    {
        return filled($this->img) ? Storage::disk('public')->url($this->img) : null;
    }

    /**
     * Сформировать уникальный slug на основе заголовка раздела.
     */
    protected function generateSlug(?string $title): string
    {
        $base = Str::slug($title ?? '');

        if ($base === '') {
            $base = 'author-section';
        }

        $slug = $base;
        $suffix = 2;

        while (self::where('slug', $slug)->whereKeyNot($this->getKey())->exists()) {
            $slug = $base.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }
}
