<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'icon',
        'image',
        'sections',
        'order',
    ];

    protected $casts = [
        'sections' => 'array',
    ];
}
