<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes;

    protected $appends = ['name'];
    protected $guarded = [];

    public function getNameAttribute()
    {
        return $this->attributes['name_' . getLocale()];
    }

    public static function updateStatuses($statuses)
    {
        $statusesIds = collect($statuses)->pluck('id')->toArray();
        Status::whereNotIn("id", $statusesIds)->delete();

        foreach ($statuses as $status) {
            if(!isset($status['id'])){
                Status::create([
                    "name_en" => $status['name_en'],
                    "name_ar" => $status['name_ar'],
                    "message_en" => $status['message_en'],
                    "message_ar" => $status['message_ar'],
                    "color" => $status['color'],
                    'is_active' => ($status['is_active'][0] ?? null) == 'on'
                ]);
            }else{
                Status::find($status['id'])->update([
                    "name_en" => $status["name_en"],
                    "name_ar" => $status["name_ar"],
                    "message_en" => $status["message_en"],
                    "message_ar" => $status["message_ar"],
                    "color" => $status["color"],
                    'is_active' => ($status['is_active'][0] ?? null) == 'on'
                ]);
            }
        }


    }
}
