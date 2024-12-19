<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'phone', 'price', 'car_name', 'car_id', 'city_id', 'type', 'status', 'client_id','opened_at','opened_by'];
    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class)->withTrashed();
    }

    public function orderDetailsCar()
    {
        return $this->hasOne(CarOrder::class);
    }

    public function statusHistory()
    {
        return $this->hasMany( OrderHistory::class)->with('employee');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class,'opened_by');
    }

}
