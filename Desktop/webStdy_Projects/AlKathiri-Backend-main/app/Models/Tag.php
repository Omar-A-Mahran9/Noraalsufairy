<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = [ 'name' ];
    protected $casts  = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];


    public function getNameAttribute()
    {
        return $this->attributes[ 'name_' . getLocale() ];
    }

    public function cars()
    {
        return $this->belongsToMany(Car::class)
                    ->select('cars.id','main_image','cover_image', 'name_ar' , 'name_en' , 'is_new', 'price_field_value', 'price_field_status',
                                     'year', 'fuel_consumption', 'upholstered_seats', 'Motion_vector', 'maximum_force', 'traction_type',
                                     'engine_type', 'car_style', 'have_discount', 'discount_price', 'price')
                    ->with('colors');
    }








}
