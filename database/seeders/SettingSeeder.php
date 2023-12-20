<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
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
                'option_name' => 'website_name_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'website_name_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'facebook_url',
                'option_value' => ''
            ],
            [
                'option_name' => 'twitter_url',
                'option_value' => ''
            ],
            [
                'option_name' => 'instagram_url',
                'option_value' => ''
            ],
            [
                'option_name' => 'youtube_url',
                'option_value' => ''
            ],
            [
                'option_name' => 'snapchat_url',
                'option_value' => ''
            ],
            [
                'option_name' => 'email',
                'option_value' => ''
            ],
            [
                'option_name' => 'phone',
                'option_value' => ''
            ],
            [
                'option_name' => 'whatsapp',
                'option_value' => ''
            ],
            [
                'option_name' => 'tax',
                'option_value' => ''
            ],
            [
                'option_name' => 'males_insurance',
                'option_value' => ''
            ],
            [
                'option_name' => 'females_insurance',
                'option_value' => ''
            ],
            [
                'option_name' => 'maintenance_mode',
                'option_value' => ''
            ],
            [
                'option_name' => 'meta_tag_description_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'meta_tag_description_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'meta_tag_keyword_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'meta_tag_keyword_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'home_cars_section_label_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'home_cars_section_label_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'purchase_order_text_in_home_page_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'purchase_order_text_in_home_page_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'privacy_policy_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'privacy_policy_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'terms_and_conditions_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'terms_and_conditions_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'slider_dashboard_username',
                'option_value' => ''
            ],
            [
                'option_name' => 'slider_dashboard_password',
                'option_value' => ''
            ],
            [
                'option_name' => 'about_us_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'about_us_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'about_us_video_url',
                'option_value' => ''
            ],
            [
                'option_name' => 'why_code_car_cars_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'why_code_car_cars_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'why_code_car_cars_card_1_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'why_code_car_cars_card_1_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'why_code_car_cars_card_2_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'why_code_car_cars_card_2_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'why_code_car_cars_card_3_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'why_code_car_cars_card_3_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'footer_text_ar',
                'option_value' => ''
            ],
            [
                'option_name' => 'footer_text_en',
                'option_value' => ''
            ],
            [
                'option_name' => 'currency',
                'option_value' => 'SAR'
            ],
        ];
        foreach ($data as $item) {
            Setting::create($item);
        }
    }
}
