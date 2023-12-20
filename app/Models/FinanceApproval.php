<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceApproval extends Model
{
    use HasFactory;
    protected $fillable = [
        'approval_date',
        'approval_amount',
        'tax_discount',
        'discount_percent',
        'discount_amount',
        'cashback_percent',
        'cashback_amount',
        'cost',
        'plate_no_cost',
        'insurance_cost',
        'delivery_cost',
        'commission',
        'profit',
        'extra_details',
        'delegate_id',
        'order_id',
    ];

    protected $casts   = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function delegate()
    {
        return $this->belongsTo(Delegate::class);
    }
}
