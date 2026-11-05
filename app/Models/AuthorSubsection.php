<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthorSubsection extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_section_id',
        'title',
        'slug',
        'number',
        'description',
        'img',
        'price',
        'cross_reference',
        'order',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $subsection): void {
            if (blank($subsection->slug)) {
                $subsection->slug = $subsection->generateSlug($subsection->title);
            }
        });
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(AuthorSection::class, 'author_section_id');
    }

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'company_author_subsection');
    }

    public function getUrlAttribute(): string
    {
        return url('/avtor/'.$this->slug);
    }

    /**
     * Последний сегмент адреса подраздела (например «support» для «ap-is/support»).
     */
    public function getSegmentAttribute(): string
    {
        return Str::afterLast($this->slug, '/');
    }

    public function getImgUrlAttribute(): ?string
    {
        return filled($this->img) ? Storage::disk('public')->url($this->img) : null;
    }

    public function getPriceLabelAttribute(): ?string
    {
        return $this->price === null
            ? null
            : 'от '.number_format($this->price, 0, ',', ' ').' руб.';
    }

    /**
     * Номер подраздела с дополненной первой частью: «01.1.1».
     */
    public function getNumberLabelAttribute(): ?string
    {
        if (blank($this->number)) {
            return null;
        }

        $parts = explode('.', (string) $this->number);
        $first = array_shift($parts);

        return str_pad($first, 2, '0', STR_PAD_LEFT).($parts ? '.'.implode('.', $parts) : '');
    }

    /**
     * Подраздел, на который ссылается кросс-ссылка.
     */
    public function crossReferencedSubsection(): ?self
    {
        return filled($this->cross_reference)
            ? self::where('number', $this->cross_reference)->first()
            : null;
    }

    /**
     * Сформировать уникальный slug подраздела на основе заголовка.
     *
     * Адрес подраздела всегда вложен в адрес родительского раздела.
     */
    protected function generateSlug(?string $title): string
    {
        $base = Str::slug($title ?? '');

        if ($base === '') {
            $base = 'podrazdel';
        }

        $prefix = $this->section?->slug;
        $slug = filled($prefix) ? $prefix.'/'.$base : $base;
        $suffix = 2;

        while (self::where('slug', $slug)->whereKeyNot($this->getKey())->exists()) {
            $slug = filled($prefix) ? $prefix.'/'.$base.'-'.$suffix : $base.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }
}
