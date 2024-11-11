<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    protected $table = 'horoscopes';

    protected $fillable = [
        'title',
        'content',
        'image',
        'published'
    ];

    public $timestamps = true;
}
