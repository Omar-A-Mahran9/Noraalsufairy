<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
    ];
    protected $casts  = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];


    public function getNameAttribute()
    {
        return $this->attributes['name_' . getLocale()];
    }
}
