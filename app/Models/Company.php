<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory;

    /**
     * Порядок букв в алфавитном указателе.
     *
     * @var array<int, string>
     */
    public const LETTERS = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
        'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л',
        'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш',
        'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
        'Цифры',
    ];

    /**
     * Подписи букв, отличающиеся от их служебного значения в БД.
     *
     * @var array<string, string>
     */
    public const LETTER_LABELS = [
        'Цифры' => '0-9',
    ];

    protected $fillable = [
        'title',
        'letter',
        'img',
        'url',
        'is_own_project',
        'is_published',
        'year_from',
        'year_to',
        'region',
        'order',
    ];

    protected $casts = [
        'is_own_project' => 'boolean',
        'is_published' => 'boolean',
        'year_from' => 'integer',
        'year_to' => 'integer',
        'order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::saving(function (self $company): void {
            if (blank($company->letter)) {
                $company->letter = self::computeLetter($company->title);
            }
        });
    }

    public function sections(): BelongsToMany
    {
        return $this->belongsToMany(AuthorSection::class, 'company_author_section');
    }

    public function subsections(): BelongsToMany
    {
        return $this->belongsToMany(AuthorSubsection::class, 'company_author_subsection');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    /**
     * Период работы с компанией в виде «2014 - 2016» или «2024 - …».
     */
    public function getYearsLabelAttribute(): ?string
    {
        if ($this->year_from === null) {
            return null;
        }

        $to = $this->year_to ?? '…';

        return $this->year_from === $this->year_to
            ? (string) $this->year_from
            : $this->year_from.' - '.$to;
    }

    public function getImgUrlAttribute(): ?string
    {
        return filled($this->img) ? Storage::disk('public')->url($this->img) : null;
    }

    /**
     * Определить букву алфавитного указателя по названию компании.
     */
    public static function computeLetter(?string $title): string
    {
        $title = trim((string) $title);
        $title = preg_replace('/^[«"\'(\[\s]+/u', '', $title) ?? $title;

        if ($title === '') {
            return 'Цифры';
        }

        $first = mb_strtolower(mb_substr($title, 0, 1));

        if (is_numeric($first)) {
            return 'Цифры';
        }

        return mb_strtoupper($first);
    }
}
