<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = ['terms_and_privacy'];
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'time' => 'date:H:i',
        'date' => 'date:Y-m-d',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
