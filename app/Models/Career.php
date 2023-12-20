<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ar',
        'title_en',
        'short_description_ar',
        'short_description_en',
        'long_description_ar',
        'address',
        'status',
        // 'address',
        'work_type',
        'city_id',
    ];
    // protected $guarded = [];
    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];

    public function getTitleAttribute()
    {
        return $this->attributes['title_' . getLocale()];
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
