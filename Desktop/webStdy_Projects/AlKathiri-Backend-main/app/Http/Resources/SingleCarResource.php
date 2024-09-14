<?php

namespace App\Http\Resources;

use App\Models\Car;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleCarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // $similarVehicles = Car::where('model_id', $this->model_id)->where('id','!=', $this->id)->orderBy('year', 'desc')->get();

        return [
            'id' => $this->id,
            'model_id' => $this->model_id,
            'name' => $this->name,
            'colors' => CarColorResource::collection($this->colors),
            'selling_price' => $this->selling_price,
            'selling_price_after_vat' => $this->selling_price_after_vat,
            'year' => $this->year,
            'fuel_consumption' => $this->fuel_consumption,
            'maximum_force' => $this->maximum_force,
            'motion_vector' => __(ucfirst($this->Motion_vector)),
            'seats_number' => $this->seats_number,
            'upholstered_seats' => __($this->upholstered_seats),
            'traction_type' => __(ucfirst(str_replace('_',' ',$this->traction_type))),
            'engine_type' => $this->engine_type,
            'description' => $this->description,
            'meta_tag_description' => $this->meta_desc,
            'meta_tag_keywords' => $this->meta_keywords,
            'price_field_status' => $this->price_field_status,
            'field_other_status' => $this->other_value
            // 'specifications_and_features' => $this->getSpecificationsAndFeatures(),
            // 'similar_vehicles' => CarResource::collection($similarVehicles),
        ];
    }

    private function getSpecificationsAndFeatures()
    {

        // $drivingMode = array_map(function($mode){
        //     return __($mode);
        // },json_decode($this['driving_mode']));
        // $drivingMode = implode(" , ",$drivingMode);
        $specifications = [
            [
                "name"   => __('Engine Specifications'),
                "image"  => asset("web/img/engine_specifications.svg"),
                "values" => collect([
                [ 'name' => __('Engine Measurement') , 'value' => $this['engine_measurement'] ],
                [ 'name' => __('Engine type') , 'value' => $this['engine_type']],
                [ 'name' => __('turbo') , 'value' => $this['turbo']],
                [ 'name' => __('Engine system') , 'value' => $this['engine_system']],
                [ 'name' => __('valves') , 'value' => $this['valves']],
                [ 'name' => __('determination') , 'value' => $this['determination']],
                [ 'name' => __('fuel consumption in liters') , 'value' => $this['fuel_consumption'] . ' ' . __('Liter')],
            ])],
            [
                "name"   => __('Transmission'),
                "image"  => asset("web/img/transmission.svg"),
                "values" => collect([
                    [ 'name' => __('Motion vector') , 'value' => $this['Motion_vector']],
                    [ 'name' => __('Shifters on the steering wheel') , 'value' => $this['wheel_shifters']],
                    [ 'name' => __('traction type') , 'value' => $this['traction_type']],
                    // [ 'name' => __('driving mode') , 'value' => $drivingMode],
            ])],
            [
                "name"   => __('Measurements'),
                "image"  => asset("web/img/measurements.svg"),
                "values" => collect([
                    [ 'name' => __('maximum force') , 'value' => $this['maximum_force']],
                    [ 'name' => __('fuel tank capacity') , 'value' => $this['fuel_tank_capacity'] . ' ' . __('Liter')],
                    [ 'name' => __('EcoBoost') , 'value' => $this['eco_boost']],
            ])],
            [
                "name"   => __('Skeleton'),
                "image"  => asset("web/img/skeleton.svg"),
                "values" => collect([
                    [ 'name' => __('Number of seats') , 'value' => $this['seats_number']],
                    [ 'name' => __('number of speakers') , 'value' => $this['speakers_number']],
                    [ 'name' => __('steering wheel') , 'value' => $this['steering_wheel']],
                    [ 'name' => __('car style') , 'value' => $this['car_style']],
                    [ 'name' => __('wheels') , 'value' => $this['wheels']],
            ])],
        ];

        $features       = collect([
            [
                "name" => __('External Equipment'),
                "image"  => asset("web/img/external_equipment.svg"),
                "features" => collect([
                    $this['bright_lights_during_the_day'] != 'unavailable' ?  __('Bright lights during the day') . ' : ' . __($this['bright_lights_during_the_day']) : null,
                    $this['fog_lights']                   != 'unavailable' ?  __('fog lights') . ' : ' . __($this['fog_lights']) : null,
                    $this['headlights']                   != null          ?  __('headlights') . ' : ' . __($this['headlights']) : null,
                    $this['smart_entry_system']           == 1             ?  __('Smart Entry System')             : null,
                    $this['chrome_door_handles']          == 1             ?  __('Chrome door handles')            : null,
                    $this['rear_parking_sensors']         == 1             ?  __('Rear parking sensors')           : null,
                    $this['front_parking_sensors']        == 1             ?  __('Front parking sensors')          : null,
                    $this['one_touch_electric_sunroof']   == 1             ?  __('One-touch electric sunroof')     : null,
                    $this['electrical_side_mirrors']      == 1             ?  __('Electric side mirrors')          : null,
                    $this['chrome_side_mirrors']          == 1             ?  __('Chrome side mirrors')            : null,
                    $this['automatic_trunk_door']         == 1             ?  __('automatic trunk door')           : null,
                    $this['led_backlight_lights']         == 1             ?  __('LED tail lights')                : null,
                    $this['rear_suite']                   == 1             ?  __('rear spoiler')                   : null,
                    $this['panorama_roof']                == 1             ?  __('panoramic roof')                 : null,
            ])->whereNotNull()->values()],
            [
                "name" => __('Ease and comfort'),
                "image"  => asset("web/img/ease_and_comfort.svg"),
                "features" => collect([
                    $this['remote_engine_start']    == 1  ?  __('Remote engine start') : null,
                    $this['electric_hand_brakes']   == 1  ?  __('Electric hand brake') : null,
                    $this['ac_in_second_row_seats'] == 1  ?  __('Air conditioning vents in the back') : null,
                    $this['engine_start_button']    == 1  ?  __('Engine start button') : null,
                    $this['cruise_control']         == 1  ?  __('cruise control') : null,
                    $this['leather_steering_wheel'] == 1  ?  __('Leather steering wheel') : null,
            ])->whereNotNull()->values()],
            [
                "name" => __('Seats'),
                "image"  => asset("web/img/seats.svg"),
                "features" => collect([
                    $this['upholstered_seats']       != null  ?  __('Seat upholstery') . ' : ' . __($this['upholstered_seats']): null,
                    $this['driver_seat_adjustment']  != null  ?  __('Driver seat adjustment') . ' : ' . __($this['driver_seat_adjustment']) : null,
                    $this['passenger_seat_movement']  != null  ?  __('Front passenger seat movement adjustment') . ' : ' . __($this['passenger_seat_movement']) : null,
                    $this['heated_seats']            == 1  ?  __('heated seats') : null,
                    $this['airy_seats']              == 1  ?  __('airy seats') : null,
            ])->whereNotNull()->values()],
            [
                "name" => __('Sound and communication system'),
                "image"  => asset("web/img/sound_communication.svg"),
                "features" => collect([
                    $this['navigation_system']          == 1  ?  __('navigation system') : null,
                    $this['info_screen']                == 1  ?  __('info screen') : null,
                    $this['back_screen']                == 1  ?  __('Entertainment screen') : null,
                    $this['cd']                         == 1  ?  __('CDs') : null,
                    $this['bluetooth']                  == 1  ?  __('bluetooth') : null,
                    $this['mp3']                        == 1  ?  __('MP3/Additional input') : null,
                    $this['usb_audio_system']           == 1  ?  __('USB graphic interface audio system') : null,
                    $this['apple_carplay_android_auto'] == 1  ?  __('Apple CarPlay and Android Auto') : null,
                    $this['hdmi']                       == 1  ?  __('HDMI interface') : null,
                    $this['wireless_charger']           == 1  ?  __('Wireless charger for cell phone') : null,
            ])->whereNotNull()->values()],
            [
                "name" => __('Safety'),
                "image"  => asset("web/img/safety.svg"),
                "features" => collect([
                    $this['front_airbags']              == 1  ?  __('front airbags (SRS)') : null,
                    $this['side_airbags']               == 1  ?  __('side airbags') : null,
                    $this['knee_airbags']               == 1  ?  __('Driver and front passenger knee airbags') : null,
                    $this['side_curtains']              == 1  ?  __('Side curtains') : null,
                    $this['rear_camera']                      ?  __('vision camera') . ' : ' . __(ucfirst(str_replace('_',' ',$this['rear_camera'])))  : null,
                    $this['vsa']                        == 1  ?  __('Vehicle Stability Assist (VSA)') : null,
                    $this['abs']                        == 1  ?  __('Anti-lock Braking System (ABS)') : null,
                    $this['ebd']                        == 1  ?  __('Electronic Brake-force Distribution (EBD)') : null,
                    $this['ess']                        == 1  ?  __('Emergency stop signal (ESS)') : null,
                    $this['ebb']                        == 1  ?  __('Electronic Brake-force Assist (EBB)') : null,
                    $this['tpms']                       == 1  ?  __('Tire pressure monitoring system (TPMS)') : null,
                    $this['hsa']                        == 1  ?  __('Hill Start Assist (HSA)') : null,
                    $this['ace']                        == 1  ?  __('Compatibility Engineering (ACE™) Chassis Architecture') : null,
                    $this['track_control_system']       == 1  ?  __('lane control system') : null,
                    $this['display_info_on_windshield'] == 1  ?  __('Display information on the windshield') : null,
            ])->whereNotNull()->values()],
            [
                "name" => __('Sensors'),
                "image"  => asset("web/img/sensors.svg"),
                "features" => collect([
                    $this['acc']                  == 1  ?  __('Adaptive Cruise Control (ACC)') : null,
                    $this['rdm']                  == 1  ?  __('Road Departure Mitigation System (RDM)') : null,
                    $this['fcw']                  == 1  ?  __('Forward Collision Warning (FCW)') : null,
                    $this['blind_spots']          == 1  ?  __('Information about invisible points (blind spots)') : null,
                    $this['lsf']                  == 1  ?  __('Low Speed Relay System (LSF)') : null,
                    $this['back_traffic_alert']   == 1  ?  __('Rear traffic alert') : null,
            ])->whereNotNull()->values()]

        ]);

        return [ collect($specifications) , $features ];
    }
}
