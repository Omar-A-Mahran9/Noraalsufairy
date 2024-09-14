<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $appends = [ 'name','address' ];
    protected $guarded = ['lat','lng'];
    protected $table = 'branches';
    protected $casts  = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        "start_time" => "datetime:H:i",
        "end_time" => "datetime:H:i",
    ];

    public function getNameAttribute()
    {
        return $this->attributes['name_' . getLocale()];
    }

    public function getTimeOfWorkAttribute()
    {
        return $this->attributes['time_of_work_' . getLocale()];
    }

    public function getAddressAttribute()
    {
        return $this->attributes['address_' . getLocale()];
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class,'branch_id');
    }
}
