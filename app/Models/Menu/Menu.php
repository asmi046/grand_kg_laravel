<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_name',
        'title',
        'order',
        'parent',
        'lnk',
    ];

    public function parentItem(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent')->orderBy('order', 'ASC');
    }
}
