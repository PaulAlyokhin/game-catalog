<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public const PLATFORMS = [
        'pc' => 'PC',
        'playstation' => 'PlayStation',
        'xbox' => 'Xbox',
        'android' => 'Android',
        'ios' => 'iOS',
    ];
    protected $casts = [
        'release_date' => 'date',
    ];
    public $timestamps = false;
    protected $fillable = [
        'title',
        'developer',
        'genre',
        'release_date',
        'platform',
        'price',
        'image',
    ];
}
