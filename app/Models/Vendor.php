<?php

namespace App\Models;

use App\Enums\VendorStatus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
    protected $appends = ['status_name'];
    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getStatusNameAttribute()
    {
        return __(ucfirst(VendorStatus::tryFrom($this->attributes['status'])->name));
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
