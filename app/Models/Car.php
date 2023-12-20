<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Car extends Model
{
    
    use HasFactory,SoftDeletes;

    protected $guarded            = [];
    protected $appends            = ['name', 'selling_price', 'price_after_vat'];
    protected $casts              = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];
    static array $carCardColumns  = [ 'id', 'name_ar' , 'name_en' , 'is_new', 'price', 'price_field_status', 'year',
                                      'have_discount', 'discount_price', 'price', 'kilometers','fuel_type','main_image'];
     protected static function booted()
    {
      
        if(request()->segment(1) != 'dashboard')
        {
            static::addGlobalScope('availableCars', function(Builder $builder){
                    $builder->where('status','1')->whereHas('colors');
            });
        }

    }

    public function images()
    {
    return $this->hasMany(CarImage::class, 'car_id');
    }

    public function getNameAttribute()
    {
        return $this->attributes['name_' . getLocale()];
    }

    public function priceOtherText($lang)
    {
        return $this->price_field_status == 'other' ? json_decode($this->attributes['price_field_value'], true)['text_' . $lang] : '';
    }

    public function getPriceFieldValueAttribute()
    {
        if ( $this->attributes['price_field_status'] === 'other')
            return json_decode( $this->attributes['price_field_value'] , true)['text_' . getLocale()];
        else
            return $this->attributes['price_field_value'];
    }

    public function colors()
    {
        return $this->belongsTo(Color::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function brand()
    {
        return $this->belongsTo( Brand::class );
    }

    public function model()
    {
        return $this->belongsTo( CarModel::class );
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

    public function hasOffers()
    {
        return $this->offers->count() > 0;
    }

    public function getSellingPriceAttribute()
    {
        return $this->have_discount && $this->discount_price ? $this->discount_price : $this->price;
    }

    public function getPriceAfterVatAttribute()
    {
        return floor($this->selling_price * ( settings()->get('tax') / 100 + 1));
    }

}
