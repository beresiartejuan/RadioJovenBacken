<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsDatails extends Model
{
    protected $fillable = [
        'news_id',
        'content',
        'published_at'
    ];

    protected $timestamps = true;
}
