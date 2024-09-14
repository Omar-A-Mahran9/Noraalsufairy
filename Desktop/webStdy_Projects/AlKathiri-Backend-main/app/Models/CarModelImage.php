<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImagePathAttribute()
    {
        return asset(getImagePathFromDirectory($this->image, 'CarModelImages'));
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class);
    }
}
