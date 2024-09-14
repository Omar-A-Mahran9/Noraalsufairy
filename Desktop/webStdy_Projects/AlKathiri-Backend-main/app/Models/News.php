<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];

    public function getTagsAttribute()
    {
        return explode(',' , $this->attributes['tags']);
    }

    public function getMainImagePathAttribute()
    {
        return getImagePathFromDirectory($this->main_image, 'News');
    }

    public function getCoverImagePathAttribute()
    {
        return getImagePathFromDirectory($this->cover_image, 'News');
    }
}
