<?php

namespace App\Models;

use App\Enums\CarStatus;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded            = [];
    protected $appends            = ['name', 'selling_price', 'price_after_vat'];
    protected $casts              = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];
    static array $carCardColumns  = [ 'id', 'main_image', 'cover_image', 'name_ar' , 'name_en' , 'is_new', 'price_field_value', 'price_field_status', 'year',
                                    'fuel_consumption', 'upholstered_seats', 'traction_type', 'have_discount', 'discount_price', 'price', 'kilometers'];

    protected static function booted()
    {
        if(request()->segment(1) != 'dashboard')
        {
            static::addGlobalScope('availableCars', function(Builder $builder){
                $builder->where('status', CarStatus::approved->value);
            });
        }
    }

    public function getNameAttribute()
    {
        return $this->attributes['name_' . getLocale()];
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function brand()
    {
        return $this->belongsTo( Brand::class );
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
