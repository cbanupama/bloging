<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getImageAttribute($value)
    {
        return asset(Storage::url($value));
    }
}
