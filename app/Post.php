<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'body',
        'image',
        'youtube_link'
    ];

    public function getImageAttribute($value)
    {
        if($value === null) {
            return $value;
        }
        if(filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }

        return asset(Storage::url($value));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
