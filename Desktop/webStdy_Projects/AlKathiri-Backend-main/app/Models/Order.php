<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['funding_organization_type'];
    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];

    public function getCarsAttribute()
    {
        return $this->attributes['cars'] ? unserialize($this->attributes['cars']) : [];
    }

    public function setCarsAttribute($value)
    {
        $this->attributes['cars'] = serialize($value);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function fundingBank()
    {
        return $this->belongsTo(Bank::class, 'funding_bank_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class)->withTrashed();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function fundingOrganization()
    {
        return $this->belongsTo(FundingOrganization::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'opened_by');
    }

    public function orderHistories()
    {
        return $this->hasMany(OrderHistory::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

}
