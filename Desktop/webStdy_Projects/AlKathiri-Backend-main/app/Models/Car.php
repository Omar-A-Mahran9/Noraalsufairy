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

    protected $guarded            = ['colors'];
    protected $appends            = ['name', 'selling_price', 'other_value'];
    protected $casts              = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];
    static array $carCardColumns  = [ 'id', 'name_ar' , 'name_en' , 'price_field_value', 'price_field_status', 'year', 'fuel_consumption', 'upholstered_seats', 'traction_type', 'have_discount', 'discount_price', 'price'];

    protected static function booted()
    {
        if(request()->segment(1) != 'dashboard')
        {
            static::addGlobalScope('availableCars', function(Builder $builder){
                $builder->where('status','1');
            });
        }
    }

    public function getMainImagePathAttribute()
    {
        return asset(getImagePathFromDirectory($this->main_image, 'Cars'));
    }

    public function getNameAttribute()
    {
        return $this->attributes['name_' . getLocale()];
    }
    public function getDescriptionAttribute()
    {
        return $this->attributes['description_' . getLocale()];
    }
    public function getMetaDescAttribute()
    {
        return $this->attributes['meta_desc_' . getLocale()];
    }
    public function getMetaKeywordsAttribute()
    {
        return $this->attributes['meta_keywords_' . getLocale()];
    }

    public function priceOtherText($lang)
    {
        return $this->price_field_status == 'other' ? json_decode($this->attributes['price_field_value'], true)['text_' . $lang] : '';
    }

    public function getOtherValueAttribute()
    {
        if ( $this->attributes['price_field_status'] === 'other')
            return json_decode( $this->attributes['price_field_value'] , true)['text_' . getLocale()];
        else
            return null;
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
        return $this->belongsToMany(Color::class);
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
        return $this->belongsTo( CarModel::class, 'model_id' );
    }
    public function testDrive()
    {
        return $this->belongsTo( TestDrive::class );
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

    public function getSellingPriceAfterVatAttribute()
    {
        return floor($this->selling_price * ( settings()->get('tax') / 100 + 1));
    }

    public function getImagesAttribute()
    {
        return $this->model?->images->pluck('image');
    }

}
