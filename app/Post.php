<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'body',
        'image',
        'youtube_link'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
