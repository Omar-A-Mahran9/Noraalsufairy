<?php

namespace Database\Seeders;

use App\Models\SettingOrderStatus;
use Illuminate\Database\Seeder;

class SettingOrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name_ar' => 'جديد',
                'name_en' => 'new',
                'color' => '#C3E2C2',
            ],
            [
                'name_ar' => 'تحت التنفيذ',
                'name_en' => 'processing',
                'color' => '#607274',
            ],
            [
                'name_ar' => 'تم الإستلام',
                'name_en' => 'delivered',
                'color' => '#5F8670',
            ],
        ];
        foreach ($data as $record) {
            SettingOrderStatus::create($record);
        }
    }
}
