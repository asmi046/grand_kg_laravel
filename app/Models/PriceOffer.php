<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceOffer extends Model
{
    protected $fillable = [
        'section_title',
        'title',
        'description',
        'price',
    ];
}
