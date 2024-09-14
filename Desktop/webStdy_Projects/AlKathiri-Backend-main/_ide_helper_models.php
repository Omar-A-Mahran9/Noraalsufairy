<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Ability
 *
 * @property int $id
 * @property string $name
 * @property string|null $category
 * @property string|null $action
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ability whereUpdatedAt($value)
 */
	class Ability extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Applicant
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $cv
 * @property string|null $comment
 * @property int $career_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Career $career
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereCareerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereCv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Applicant whereUpdatedAt($value)
 */
	class Applicant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Appointment
 *
 * @property int $id
 * @property int $brand_id
 * @property int $model_id
 * @property int $city_id
 * @property int $branch_id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $model_year
 * @property string $description
 * @property string $status
 * @property \Illuminate\Support\Carbon $date
 * @property \Illuminate\Support\Carbon $time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Branch $branch
 * @property-read \App\Models\Brand $brand
 * @property-read \App\Models\City $city
 * @property-read \App\Models\CarModel $model
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereModelYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appointment whereUpdatedAt($value)
 */
	class Appointment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Bank
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bank whereUpdatedAt($value)
 */
	class Bank extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Branch
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $address_ar
 * @property string $address_en
 * @property string|null $email
 * @property string $phone
 * @property string $whatsapp
 * @property string $google_map_url
 * @property \Illuminate\Support\Carbon|null $start_time
 * @property \Illuminate\Support\Carbon|null $end_time
 * @property string $frame
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $city_id
 * @property-read \App\Models\City $city
 * @property-read mixed $address
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereAddressAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereAddressEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereFrame($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereGoogleMapUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereWhatsapp($value)
 */
	class Branch extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $image
 * @property string $cover
 * @property string|null $car_available_types
 * @property string|null $meta_keyword_ar
 * @property string|null $meta_keyword_en
 * @property string|null $meta_desc_en
 * @property string|null $meta_desc_ar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 * @property-read mixed $image_path
 * @property-read mixed $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $newCars
 * @property-read int|null $new_cars_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $oldCars
 * @property-read int|null $old_cars_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CarModel[] $parentModels
 * @property-read int|null $parent_models_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CarModel[] $subModels
 * @property-read int|null $sub_models_count
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCarAvailableTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereMetaDescAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereMetaDescEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereMetaKeywordAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereMetaKeywordEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 */
	class Brand extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Car
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string|null $card_description_ar
 * @property string|null $card_description_en
 * @property string $description_ar
 * @property string $description_en
 * @property string $main_image
 * @property string $cover_image
 * @property string|null $share_image
 * @property string|null $video_url
 * @property int $is_new
 * @property int $show_in_home_page
 * @property int $available_for_test_drive
 * @property string|null $distance
 * @property int $year
 * @property string $supplier
 * @property int $low_price
 * @property int $status
 * @property int $tax_on_exhibition
 * @property int $tax
 * @property int $price
 * @property int|null $discount_price
 * @property int $have_discount
 * @property string $price_field_status
 * @property string $price_field_value
 * @property string|null $meta_keywords_ar
 * @property string|null $meta_keywords_en
 * @property string|null $meta_desc_ar
 * @property string|null $meta_desc_en
 * @property string $engine_measurement
 * @property string $engine_type
 * @property string $turbo
 * @property string $engine_system
 * @property string $valves
 * @property string $determination
 * @property string $fuel_consumption
 * @property string $Motion_vector
 * @property string $wheel_shifters
 * @property string $traction_type
 * @property string $driving_mode
 * @property string $maximum_force
 * @property string $fuel_tank_capacity
 * @property string $eco_boost
 * @property int $seats_number
 * @property int $speakers_number
 * @property string $steering_wheel
 * @property string $car_style
 * @property string $wheels
 * @property string|null $bright_lights_during_the_day
 * @property string|null $fog_lights
 * @property string|null $headlights
 * @property int|null $smart_entry_system
 * @property int|null $chrome_door_handles
 * @property int|null $rear_parking_sensors
 * @property int|null $front_parking_sensors
 * @property int|null $one_touch_electric_sunroof
 * @property int|null $electrical_side_mirrors
 * @property int|null $chrome_side_mirrors
 * @property int|null $automatic_trunk_door
 * @property int|null $led_backlight_lights
 * @property int|null $rear_suite
 * @property int|null $panorama_roof
 * @property int|null $remote_engine_start
 * @property int|null $electric_hand_brakes
 * @property int|null $ac_in_second_row_seats
 * @property int|null $engine_start_button
 * @property int|null $cruise_control
 * @property int|null $leather_steering_wheel
 * @property string|null $upholstered_seats
 * @property string|null $driver_seat_adjustment
 * @property string|null $passenger_seat_movement
 * @property int|null $heated_seats
 * @property int|null $airy_seats
 * @property int|null $navigation_system
 * @property int|null $info_screen
 * @property int|null $back_screen
 * @property int|null $cd
 * @property int|null $bluetooth
 * @property int|null $mp3
 * @property int|null $usb_audio_system
 * @property int|null $apple_carplay_android_auto
 * @property int|null $hdmi
 * @property int|null $wireless_charger
 * @property int|null $front_airbags
 * @property int|null $side_airbags
 * @property int|null $knee_airbags
 * @property int|null $side_curtains
 * @property int|null $rear_camera
 * @property int|null $vsa
 * @property int|null $abs
 * @property int|null $ebd
 * @property int|null $ess
 * @property int|null $ebb
 * @property int|null $tpms
 * @property int|null $hsa
 * @property int|null $ace
 * @property int|null $track_control_system
 * @property int|null $display_info_on_windshield
 * @property int|null $acc
 * @property int|null $rdm
 * @property int|null $fcw
 * @property int|null $blind_spots
 * @property int|null $lsf
 * @property int|null $back_traffic_alert
 * @property int|null $kilometers
 * @property int $brand_id
 * @property int $model_id
 * @property int|null $sub_model_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Brand $brand
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Color[] $colors
 * @property-read int|null $colors_count
 * @property-read mixed $cover_image_path
 * @property-read mixed $description
 * @property-read mixed $main_image_path
 * @property-read mixed $meta_desc
 * @property-read mixed $meta_keywords
 * @property-read mixed $name
 * @property-read mixed $selling_price_after_vat
 * @property-read mixed $selling_price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Offer[] $offers
 * @property-read int|null $offers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tag[] $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Car newQuery()
 * @method static \Illuminate\Database\Query\Builder|Car onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Car query()
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereAbs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereAcInSecondRowSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereAcc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereAce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereAirySeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereAppleCarplayAndroidAuto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereAutomaticTrunkDoor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereAvailableForTestDrive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereBackScreen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereBackTrafficAlert($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereBlindSpots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereBluetooth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereBrightLightsDuringTheDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCarStyle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCardDescriptionAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCardDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereChromeDoorHandles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereChromeSideMirrors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereCruiseControl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDescriptionAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDetermination($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDiscountPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDisplayInfoOnWindshield($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDriverSeatAdjustment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereDrivingMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereEbb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereEbd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereEcoBoost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereElectricHandBrakes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereElectricalSideMirrors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereEngineMeasurement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereEngineStartButton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereEngineSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereEngineType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereEss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereFcw($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereFogLights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereFrontAirbags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereFrontParkingSensors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereFuelConsumption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereFuelTankCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereHaveDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereHdmi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereHeadlights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereHeatedSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereHsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereInfoScreen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereIsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereKilometers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereKneeAirbags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereLeatherSteeringWheel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereLedBacklightLights($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereLowPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereLsf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereMainImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereMaximumForce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereMetaDescAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereMetaDescEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereMetaKeywordsAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereMetaKeywordsEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereMotionVector($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereMp3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereNavigationSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereOneTouchElectricSunroof($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car wherePanoramaRoof($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car wherePassengerSeatMovement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car wherePriceFieldStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car wherePriceFieldValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereRdm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereRearCamera($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereRearParkingSensors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereRearSuite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereRemoteEngineStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereSeatsNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereShareImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereShowInHomePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereSideAirbags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereSideCurtains($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereSmartEntrySystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereSpeakersNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereSteeringWheel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereSubModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereSupplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereTaxOnExhibition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereTpms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereTrackControlSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereTractionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereTurbo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereUpholsteredSeats($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereUsbAudioSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereValves($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereVideoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereVsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereWheelShifters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereWheels($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereWirelessCharger($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Car whereYear($value)
 * @method static \Illuminate\Database\Query\Builder|Car withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Car withoutTrashed()
 */
	class Car extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarModel
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string|null $meta_keyword_ar
 * @property string|null $meta_keyword_en
 * @property string|null $meta_desc_ar
 * @property string|null $meta_desc_en
 * @property int|null $parent_model_id
 * @property int $brand_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Brand $brand
 * @property-read mixed $name
 * @property-read CarModel|null $parentModel
 * @property-read \Illuminate\Database\Eloquent\Collection|CarModel[] $subModels
 * @property-read int|null $sub_models_count
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereMetaDescAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereMetaDescEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereMetaKeywordAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereMetaKeywordEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereParentModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CarModel whereUpdatedAt($value)
 */
	class CarModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CarModelImage
 *
 * @property-read mixed $image_path
 * @property-read \App\Models\CarModel $model
 * @method static \Illuminate\Database\Eloquent\Builder|CarModelImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModelImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CarModelImage query()
 */
	class CarModelImage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Career
 *
 * @property int $id
 * @property string $title
 * @property string $short_description
 * @property string $long_description
 * @property string $address
 * @property int $status
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|Career newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Career newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Career query()
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereLongDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Career whereUpdatedAt($value)
 */
	class Career extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Branch[] $branches
 * @property-read int|null $branches_count
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Client
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 */
	class Client extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Color
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string|null $hex_code
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Query\Builder|Color onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereHexCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Color withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Color withoutTrashed()
 */
	class Color extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ContactUs
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $title
 * @property string $message
 * @property string|null $reply
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactUs whereUpdatedAt($value)
 */
	class ContactUs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $image
 * @property string|null $verification_code
 * @property string|null $device_token
 * @property string|null $fcm_mobile_token
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereFcmMobileToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employee whereVerificationCode($value)
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FundingOrganization
 *
 * @property int $id
 * @property string $image
 * @property string $name_ar
 * @property string $name_en
 * @property string $offer_ar
 * @property string $offer_en
 * @property int $status
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $image_path
 * @property-read mixed $name
 * @property-read mixed $offer
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization query()
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization whereOfferAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization whereOfferEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FundingOrganization whereUpdatedAt($value)
 */
	class FundingOrganization extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\News
 *
 * @property int $id
 * @property string $title
 * @property string $main_image
 * @property string|null $cover_image
 * @property string $tags
 * @property string $description
 * @property int $highlighted
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $cover_image_path
 * @property-read mixed $main_image_path
 * @method static \Illuminate\Database\Eloquent\Builder|News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|News query()
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereHighlighted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereMainImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|News whereUpdatedAt($value)
 */
	class News extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NewsSubscriber
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSubscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSubscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSubscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSubscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSubscriber whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSubscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NewsSubscriber whereUpdatedAt($value)
 */
	class NewsSubscriber extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Offer
 *
 * @property int $id
 * @property string $image
 * @property string $title_ar
 * @property string $title_en
 * @property string $description_ar
 * @property string $description_en
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 * @property-read mixed $description
 * @property-read mixed $image_path
 * @property-read mixed $title
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDescriptionAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereTitleAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereUpdatedAt($value)
 */
	class Offer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $status_id
 * @property int|null $bank_id
 * @property int|null $car_id
 * @property int|null $opened_by
 * @property int|null $color_id
 * @property int|null $city_id
 * @property string $type
 * @property string $payment_type
 * @property string|null $driving_license
 * @property string|null $name
 * @property string $phone
 * @property string|null $cars
 * @property string|null $car_name
 * @property string|null $organization_name
 * @property string|null $organization_email
 * @property string|null $organization_activity
 * @property string|null $organization_ceo
 * @property string|null $organization_age
 * @property string|null $organization_location
 * @property string|null $work
 * @property float|null $price
 * @property float|null $salary
 * @property float|null $commitments
 * @property int|null $having_loan
 * @property int|null $first_installment
 * @property int|null $last_installment
 * @property int|null $first_payment_value
 * @property string|null $opened_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Bank|null $bank
 * @property-read \App\Models\Car|null $car
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Employee|null $employee
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderHistory[] $orderHistories
 * @property-read int|null $order_histories_count
 * @property-read \App\Models\Status $status
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereBankId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCarName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCars($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereColorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCommitments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDrivingLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereFirstInstallment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereFirstPaymentValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereHavingLoan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLastInstallment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOpenedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOpenedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrganizationActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrganizationAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrganizationCeo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrganizationEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrganizationLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrganizationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereWork($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderHistory
 *
 * @property int $id
 * @property int $status_id
 * @property string|null $comment
 * @property int|null $employee_id
 * @property int|null $order_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Employee|null $employee
 * @property-read \App\Models\Status $status
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderHistory whereUpdatedAt($value)
 */
	class OrderHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RevSlider
 *
 * @method static \Illuminate\Database\Eloquent\Builder|RevSlider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RevSlider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RevSlider query()
 */
	class RevSlider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ability[] $abilities
 * @property-read int|null $abilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Employee[] $employees
 * @property-read int|null $employees_count
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Schedule
 *
 * @property int $id
 * @property string $day_of_week
 * @property int $is_available
 * @property \Illuminate\Support\Carbon|null $start_time format : h:i a
 * @property \Illuminate\Support\Carbon|null $end_time format : h:i a
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereStartTime($value)
 */
	class Schedule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Service
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string|null $title_ar
 * @property string|null $title_en
 * @property string $description_ar
 * @property string $description_en
 * @property string $image
 * @property int $price
 * @property int|null $discount_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $description
 * @property-read mixed $name
 * @property-read mixed $title
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescriptionAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDescriptionEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereDiscountPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitleAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Status
 *
 * @property int $id
 * @property string $name_en
 * @property string $name_ar
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Query\Builder|Status onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Status withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Status withoutTrashed()
 */
	class Status extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subscriber
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereUpdatedAt($value)
 */
	class Subscriber extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tag
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $bg_color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Car[] $cars
 * @property-read int|null $cars_count
 * @property-read mixed $name
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Query\Builder|Tag onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereNameAr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Tag withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Tag withoutTrashed()
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

