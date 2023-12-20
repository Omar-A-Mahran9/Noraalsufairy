<?php

namespace App\Http\Controllers\Dashboard;

use App\Rules\NotUrl;
use App\Models\Setting;
use App\Models\RevSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SettingOrderStatus;

class SettingController extends Controller
{
    public function index()
    {
        // $sliders = RevSlider::get();
        $this->authorize('view_settings');
        $setting = Setting::first();
        $orderStatuses = SettingOrderStatus::get();
        // return view('dashboard.settings', compact('sliders'));
        return view('dashboard.settings', compact('setting', 'orderStatuses'));
    }

    public function store(Request $request)
    {
        $this->authorize('create_settings');
        $data = $request->validate([
            'website_name_ar'                                  => ['required_if:setting_type,general', 'nullable', 'string', 'max:255'],
            'website_name_en'                                  => ['required_if:setting_type,general', 'nullable', 'string', 'max:255'],
            'facebook_url'                                     => ['required_if:setting_type,general', 'url', 'nullable', 'string', 'max:255'],
            'twitter_url'                                      => ['required_if:setting_type,general', 'url', 'nullable', 'string', 'max:255'],
            'instagram_url'                                    => ['required_if:setting_type,general', 'url', 'nullable', 'string', 'max:255'],
            'youtube_url'                                      => ['required_if:setting_type,general', 'url', 'nullable', 'string', 'max:255'],
            'snapchat_url'                                     => ['required_if:setting_type,general', 'url', 'nullable', 'string', 'max:255'],
            'email'                                            => ['required_if:setting_type,general', 'nullable', 'string', 'max:255'],
            'phone'                                            => ['required_if:setting_type,general', 'nullable', 'string', 'max:255'],
            'whatsapp'                                         => ['required_if:setting_type,general', 'nullable', 'string', 'max:255'],
            'tax'                                              => ['required_if:setting_type,general', 'numeric', 'between:0,100'],
            'males_insurance'                                  => ['required_if:setting_type,general', 'numeric', 'between:0,100'],
            'females_insurance'                                => ['required_if:setting_type,general', 'numeric', 'between:0,100'],
            'maintenance_mode'                                 => ['required_if:setting_type,general', 'nullable', 'string', 'max:255'],
            'orders_statuses'                                  => ['required_if:setting_type,general', 'array'],
            'orders_statuses.*.name_ar'                        => ['required_if:setting_type,general'],
            'orders_statuses.*.name_en'                        => ['required_if:setting_type,general'],
            'orders_statuses.*.color'                          => ['required_if:setting_type,general'],
            'meta_tag_description_ar'                          => ['required_if:setting_type,seo', 'nullable', 'string', 'max:255'],
            'meta_tag_description_en'                          => ['required_if:setting_type,seo', 'nullable', 'string', 'max:255'],
            'meta_tag_keyword_ar'                              => ['required_if:setting_type,seo', 'nullable', 'string', 'max:255'],
            'meta_tag_keyword_en'                              => ['required_if:setting_type,seo', 'nullable', 'string', 'max:255'],
            'home_cars_section_label_ar'                       => ['required_if:setting_type,website', 'nullable', 'string', 'max:255'],
            'home_cars_section_label_en'                       => ['required_if:setting_type,website', 'nullable', 'string', 'max:255'],
            'purchase_order_text_in_home_page_ar'              => ['required_if:setting_type,website', 'nullable', 'string'],
            'purchase_order_text_in_home_page_en'              => ['required_if:setting_type,website', 'nullable', 'string'],
            'privacy_policy_ar'                                => ['required_if:setting_type,website', 'nullable', 'string'],
            'privacy_policy_en'                                => ['required_if:setting_type,website', 'nullable', 'string'],
            'terms_and_conditions_en'                          => ['required_if:setting_type,website', 'nullable', 'string'],
            'terms_and_conditions_ar'                          => ['required_if:setting_type,website', 'nullable', 'string'],
            'slider_dashboard_username'                        => ['required_if:setting_type,website', 'nullable', 'string'],
            'slider_dashboard_password'                        => ['required_if:setting_type,website', 'nullable', 'string'],
            //    'slider_ar'                                        => [ 'required_if:setting_type,website' ,'exists:revslider_sliders,alias'  ],
            //    'slider_en'                                        => [ 'required_if:setting_type,website' ,'exists:revslider_sliders,alias'  ],
            'about_us_ar'                                      => ['required_if:setting_type,about-website', 'nullable', 'string'],
            'about_us_en'                                      => ['required_if:setting_type,about-website', 'nullable', 'string'],
            'about_us_video_url'                               => ['required_if:setting_type,about-website', 'nullable', 'string', 'max:255', new NotUrl],
            'why_code_car_cars_ar'                               => ['required_if:setting_type,about-website', 'nullable', 'string'],
            'why_code_car_cars_en'                               => ['required_if:setting_type,about-website', 'nullable', 'string'],
            'why_code_car_cars_card_1_ar'                        => ['required_if:setting_type,about-website', 'nullable', 'string'],
            'why_code_car_cars_card_1_en'                        => ['required_if:setting_type,about-website', 'nullable', 'string'],
            'why_code_car_cars_card_2_ar'                        => ['required_if:setting_type,about-website', 'nullable', 'string'],
            'why_code_car_cars_card_2_en'                        => ['required_if:setting_type,about-website', 'nullable', 'string'],
            'why_code_car_cars_card_3_ar'                        => ['required_if:setting_type,about-website', 'nullable', 'string'],
            'why_code_car_cars_card_3_en'                        => ['required_if:setting_type,about-website', 'nullable', 'string'],
            'footer_text_ar'                                   => ['required_if:setting_type,about-website', 'nullable', 'string', 'max:255'],
            'footer_text_en'                                   => ['required_if:setting_type,about-website', 'nullable', 'string', 'max:255'],
        ]);

        $data['phone'] = convertArabicNumbers($data['phone']);
        $data['whatsapp'] = convertArabicNumbers($data['whatsapp']);

        $this->validateFiles('who_code_car_photo', 'about-website', $request, $data);
        $this->validateFiles('purchase_section_photo', 'about-website', $request, $data);
        $this->validateFiles('contact_us_section_photo', 'about-website', $request, $data);
        $this->validateFiles('logo', 'general', $request, $data);
        $this->validateFiles('favicon', 'general', $request, $data);
        // dd($data);
        foreach ($data as $key => $value) {
            settings()->set($key, $value);
        }
    }

    private function validateFiles($keyName, $sectionName, Request $request, &$data)
    {
        if (!settings()->get($keyName)) {
            $request->validate([
                $keyName   => ['bail', "required_if:setting_type,$sectionName", 'image', 'mimes:webp', 'max:2048',  'nullable'],
            ]);
        }


        if ($request->hasFile($keyName)) {
            $request->validate([
                $keyName   => ['bail', 'image', 'mimes:webp', 'max:2048']
            ]);
            $data[$keyName] = uploadImage($request->file($keyName), "Settings");
        }
    }

    public function changeThemeMode(Request $request)
    {
        session()->put('theme_mode', $request->mode);
        return redirect()->back();
    }

    public function changeLanguage(Request $request)
    {
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}
