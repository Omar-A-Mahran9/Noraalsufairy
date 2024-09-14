<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table   = "models";
    protected $guarded = ['images'];
    protected $appends = ['name', 'first_image'];
    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];
    public function getNameAttribute()
    {
        return $this->attributes['name_'. getLocale()];
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(CarModelImage::class, 'model_id');
    }

    public function getFirstImageAttribute()
    {
        return getImagePathFromDirectory($this->images->first()->image, 'CarModelImages');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'model_id');
    }

    public function parentModel()
    {
        return $this->belongsTo(CarModel::class, 'parent_model_id');
    }

}
