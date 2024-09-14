<?php

namespace App\Http\Requests;

use App\Rules\NotUrl;
use Illuminate\Foundation\Http\FormRequest;

class StoreSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_settings');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'website_name_ar'                                  => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'website_name_en'                                  => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'facebook_url'                                     => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ], // ,'url'
            'twitter_url'                                      => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ], // ,'url'
            'instagram_url'                                    => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ], // ,'url'
            'youtube_url'                                      => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ], // ,'url'
            'snapchat_url'                                     => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ], // ,'url'
            'email'                                            => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'phone'                                            => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'whatsapp'                                         => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            // 'tax'                                              => [ 'required_if:setting_type,general' ,'nullable' , 'integer' , 'max:100'  ],
            // 'maintenance_mode'                                 => [ 'required_if:setting_type,general' ,'nullable' , 'string' , 'max:255'  ],
            'orders_statuses'                                  => [ 'required_if:setting_type,general' ,'array'],
            'orders_statuses.*.name_ar'                        => [ 'required_if:setting_type,general' ],
            'orders_statuses.*.name_en'                        => [ 'required_if:setting_type,general' ],
            'orders_statuses.*.color'                          => [ 'required_if:setting_type,general' ],
            'meta_tag_description_ar'                          => [ 'nullable' , 'string' , 'max:255'  ],
            'meta_tag_description_en'                          => [ 'nullable' , 'string' , 'max:255'  ],
            'meta_tag_keyword_ar'                              => [ 'nullable' , 'string' , 'max:255'  ],
            'meta_tag_keyword_en'                              => [ 'nullable' , 'string' , 'max:255'  ],
            'home_cars_section_label_ar'                       => [ 'required_if:setting_type,website' ,'nullable' , 'string' , 'max:255'  ],
            'home_cars_section_label_en'                       => [ 'required_if:setting_type,website' ,'nullable' , 'string' , 'max:255'  ],
            'privacy_policy_ar'                                => [ 'required_if:setting_type,website' ,'nullable' , 'string' ],
            'privacy_policy_en'                                => [ 'required_if:setting_type,website' ,'nullable' , 'string' ],
            'terms_and_conditions_en'                          => [ 'required_if:setting_type,website' ,'nullable' , 'string' ],
            'terms_and_conditions_ar'                          => [ 'required_if:setting_type,website' ,'nullable' , 'string' ],
            // 'slider_ar'                                        => [ 'required_if:setting_type,website'   ], //,'exists:revslider_sliders,alias'
            // 'slider_en'                                        => [ 'required_if:setting_type,website'   ], //,'exists:revslider_sliders,alias'
            // 'slider_dashboard_username'                        => [ 'required_if:setting_type,website' ,'nullable' , 'string'  ],
            // 'slider_dashboard_password'                        => [ 'required_if:setting_type,website' ,'nullable' , 'string'  ],
            'about_us_ar'                                      => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'about_us_en'                                      => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'about_us_video_url'                               => [ 'required_if:setting_type,about-website' ,'nullable' , 'string', 'max:255' , new NotUrl  ],
            'why_alkathiri_cars_ar'                               => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'why_alkathiri_cars_en'                               => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'why_alkathiri_cars_card_1_ar'                        => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'why_alkathiri_cars_card_1_en'                        => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'why_alkathiri_cars_card_2_ar'                        => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'why_alkathiri_cars_card_2_en'                        => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'why_alkathiri_cars_card_3_ar'                        => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],
            'why_alkathiri_cars_card_3_en'                        => [ 'required_if:setting_type,about-website' ,'nullable' , 'string' ],

        ];
    }
}
