<?php

namespace App\Models;

use App\Enums\CoursesStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded            = [];
    protected $appends            = ['name', 'description'];
    protected $casts              = ['created_at' => 'date:Y-m-d', 'updated_at' => 'date:Y-m-d'];
  

    protected static function booted()
    {
        if(request()->segment(1) != 'dashboard')
        {
            static::addGlobalScope('status', function(Builder $builder){
                $builder->where('status', CoursesStatus::approved->value);
            });
        }
    }

    public function getNameAttribute()
    {
        return $this->attributes['name_' . getLocale()];
    }
    public function getDescriptionAttribute()
    {
        return $this->attributes['description_' . getLocale()];
    }
}
