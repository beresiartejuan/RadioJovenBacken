<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    public $fillable = [
        'user_id',
        'title',
        'summary',
        'published'
    ];

    public $timestamps = true;

    /**
     * Define la relación de uno a uno con NewsDetails.
     */
    public function details(): HasOne
    {
        return $this->hasOne(NewsDatails::class, 'news_id');
    }
}
