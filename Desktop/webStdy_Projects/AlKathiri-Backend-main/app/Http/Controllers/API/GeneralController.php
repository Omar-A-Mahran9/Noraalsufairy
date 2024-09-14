<?php

namespace App\Http\Controllers\API;

use App\Models\Faq;
use App\Models\Brand;
use App\Models\CarModel;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;

class GeneralController extends Controller
{
    public function index()
    {

        $brandsWithModels = Brand::whereHas('cars')->with(['parentModels'])->get()->map(function($brand){
            return [
                "id" => $brand->id,
                "image" => $brand->image_path,
                "name" => $brand->name,
                "parent_models" => $brand->parentModels->map(function($parentModel){
                    return [
                        'id' => $parentModel->id,
                        'name' => $parentModel->name,
                    ];
                })
            ];
        });
        return [
            "brands" => BrandResource::collection(Brand::whereHas('cars')->get()),
            "brands_with_models" => $brandsWithModels,
            "terms_and_conditions" => settings()->get('terms_and_conditions_' . app()->getLocale()),
            "privacy_policy" => settings()->get('privacy_policy_' . app()->getLocale()),
            "about_us" => settings()->get('about_us_' . app()->getLocale()),
            "about_us_video_url" => settings()->get('about_us_video_url'),
            "why_alkathiri_cars" => settings()->get('why_alkathiri_cars_' . app()->getLocale()),
            "why_alkathiri_cars_card_1" => settings()->get('why_alkathiri_cars_card_1_' . app()->getLocale()),
            "why_alkathiri_cars_card_2" => settings()->get('why_alkathiri_cars_card_2_' . app()->getLocale()),
            "why_alkathiri_cars_card_3" => settings()->get('why_alkathiri_cars_card_3_' . app()->getLocale()),
            "facebook_url" => settings()->get('facebook_url'),
            "twitter_url" => settings()->get('twitter_url'),
            "instagram_url" => settings()->get('instagram_url'),
            "whatsapp" => settings()->get('whatsapp'),
            "snapchat" => settings()->get('snapchat_url'),
            "email" => settings()->get('email'),
            "phone" => settings()->get('phone'),
            "meta_tag_description" => settings()->get('meta_tag_description_' . app()->getLocale()),
            "meta_tag_keywords" => settings()->get('meta_tag_keyword_' . app()->getLocale()),
        ];
    }
}
