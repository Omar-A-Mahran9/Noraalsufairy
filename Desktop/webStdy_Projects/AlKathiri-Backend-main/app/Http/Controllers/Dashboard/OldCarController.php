<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Tag;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_cars');

        if ( $request->ajax() ) {

            $cars = getModelData( model: new Car() , relations: ['brand' => ['id' , 'name_' . getLocale() ] ] );

            return  response()->json($cars);
        }
        return view('dashboard.cars.index');
    }

    public function create()
    {
        $this->authorize('create_cars');

        $brands = Brand::select('id','name_' . getLocale())->get();
        $colors = Color::select('id','image','name_' . getLocale(),'hex_code')->get();
        $tags   = Tag::select('id','name_' . getLocale() )->get();

        return view('dashboard.cars.create',compact('brands','colors','tags'));
    }

    public function edit(Car $car)
    {
        $this->authorize('update_cars');

        $car->load('colors');

        $brands  = Brand::select('id','name_' . getLocale())->get();
        $colors  = Color::select('id','image','name_' . getLocale(),'hex_code')->get();
        $tags    = Tag::select('id','name_' . getLocale() )->get();

        return view('dashboard.cars.edit',compact('brands','colors','car','tags'));
    }

    public function validateStep( Request $request , Car $car = null)
    {

        if ($request['step'] == 1) {

            $discountPrice = $request['discount_price'] ?? 0;
            $price         = $request['price'] ?? 0;

            $request->validate([
                'brand_id' => ['required'],
                'model_id' => ['required'],
                'sub_model_id' => ['required'],
                'year' => ['required'],
                'card_description_ar' => ['required' , 'string','max:255'],
                'card_description_en' => ['required' , 'string','max:255'],
                'description_ar' => ['required' , 'string'],
                'description_en' => ['required' , 'string'],
                'video_url' => ['nullable' , 'string','url'],
                'price' => 'required | numeric|lte:2147483647|not_in:0|gt:' . $discountPrice,
                'discount_price' => 'required_with:have_discount|nullable|numeric|not_in:0|lt:' . $price,
                'price_field_status' => ['required' , 'string'],
                'tax_on_exhibition' => ['required'],
                'tax' => ['required'],
                'low_price' => ['required'],
                'supplier' => ['required','in:gulf,saudi'],
                'status' => ['required'],
                'is_new' => ['required'],
                'other_text_ar' => ['required_if:price_field_status,other','nullable','string','max:255'],
                'other_text_en' => ['required_if:price_field_status,other','nullable','string','max:255'],
                'show_in_home_page' => ['required', 'in:0,1'],
                'available_for_test_drive' => ['required', 'in:0,1'],
                'kilometers' => ['required_if:is_new,0', 'numeric', 'nullable', 'min:1'],
            ]);

        }elseif ($request['step'] == 2) {

            $request->validate([
                'main_image'  => [ $car ? 'nullable' : 'required' , 'image'],
                'cover_image' => [ $car ? 'nullable' : 'required' , 'image'],
                'share_image' => ['nullable' , 'image'],
                'colors'      => ['required','array','min:1'],
                'colors.*.inner_images' => $car ? 'nullable' : 'required',
                'colors.*.outer_images' => $car ? 'nullable' : 'required',
                'colors.*.inner_images.*' => 'image',
                'colors.*.outer_images.*' => 'image',
            ]);

        }elseif ($request['step'] == 3) {

            $request->validate([
                'meta_keywords_ar'   => 'nullable|string|max:255' ,
                'meta_keywords_en'   => 'nullable|string|max:255' ,
                'meta_desc_ar'       => 'nullable|string|max:255' ,
                'meta_desc_en'       => 'nullable|string|max:255' ,
                'engine_measurement' => 'required|string|max:255' ,
                'engine_type'        => 'required|string|max:255' ,
                'valves'             => 'required|string|max:255' ,
                'maximum_force'      => 'required|string|max:255' ,
                'determination'      => 'required|string|max:255' ,
                'fuel_consumption'   => 'required|string|max:255' ,
                'wheels'             => 'required|string|max:255' ,
                'fuel_tank_capacity' => 'required|string|max:255' ,
                'driving_mode'       => 'required|array|min:1' ,
                'speakers_number'    => 'required|integer' ,
                'seats_number'       => 'required|integer' ,
                'car_style'          => 'required|string' ,
                'traction_type'      => 'required|string' ,
                'Motion_vector'      => 'required|string' ,
                'turbo'              => 'required|string' ,
                'engine_system'      => 'required|string' ,
                'steering_wheel'     => 'required|string' ,
                'eco_boost'          => 'required|string' ,
                'wheel_shifters'     => 'required|string'
            ]);

        }elseif ($request['step'] == 4) {

            $request->validate([
                'bright_lights_during_the_day'  => 'required|string|max:255' ,
                'fog_lights'                    => 'required|string|max:255' ,
                'headlights'                    => 'required|string|max:255' ,
                'upholstered_seats'             => 'required|string|max:255' ,
                'driver_seat_adjustment'        => 'required|string|max:255' ,
                'passenger_seat_movement'       => 'required|string|max:255' ,
                'smart_entry_system'            => 'required|in:1,0' ,
                'chrome_door_handles'           => 'required|in:1,0' ,
                'rear_parking_sensors'          => 'required|in:1,0' ,
                'front_parking_sensors'         => 'required|in:1,0' ,
                'one_touch_electric_sunroof'    => 'required|in:1,0' ,
                'electrical_side_mirrors'       => 'required|in:1,0' ,
                'chrome_side_mirrors'           => 'required|in:1,0' ,
                'automatic_trunk_door'          => 'required|in:1,0' ,
                'led_backlight_lights'          => 'required|in:1,0' ,
                'rear_suite'                    => 'required|in:1,0' ,
                'panorama_roof'                 => 'required|in:1,0' ,
                'remote_engine_start'           => 'required|in:1,0' ,
                'electric_hand_brakes'          => 'required|in:1,0' ,
                'ac_in_second_row_seats'        => 'required|in:1,0' ,
                'engine_start_button'           => 'required|in:1,0' ,
                'cruise_control'                => 'required|in:1,0' ,
                'leather_steering_wheel'        => 'required|in:1,0' ,
                'heated_seats'                  => 'required|in:1,0' ,
                'airy_seats'                    => 'required|in:1,0' ,
                'navigation_system'             => 'required|in:1,0' ,
                'info_screen'                   => 'required|in:1,0' ,
                'back_screen'                   => 'required|in:1,0' ,
                'cd'                            => 'required|in:1,0' ,
                'bluetooth'                     => 'required|in:1,0' ,
                'mp3'                           => 'required|in:1,0' ,
                'usb_audio_system'              => 'required|in:1,0' ,
                'apple_carplay_android_auto'    => 'required|in:1,0' ,
                'hdmi'                          => 'required|in:1,0' ,
                'wireless_charger'              => 'required|in:1,0' ,
                'front_airbags'                 => 'required|in:1,0' ,
                'side_airbags'                  => 'required|in:1,0' ,
                'knee_airbags'                  => 'required|in:1,0' ,
                'side_curtains'                 => 'required|in:1,0' ,
                'rear_camera'                   => 'required|in:1,0' ,
                'vsa'                           => 'required|in:1,0' ,
                'abs'                           => 'required|in:1,0' ,
                'ebd'                           => 'required|in:1,0' ,
                'ess'                           => 'required|in:1,0' ,
                'ebb'                           => 'required|in:1,0' ,
                'tpms'                          => 'required|in:1,0' ,
                'hsa'                           => 'required|in:1,0' ,
                'ace'                           => 'required|in:1,0' ,
                'track_control_system'          => 'required|in:1,0' ,
                'display_info_on_windshield'    => 'required|in:1,0' ,
                'acc'                           => 'required|in:1,0' ,
                'rdm'                           => 'required|in:1,0' ,
                'fcw'                           => 'required|in:1,0' ,
                'blind_spots'                   => 'required|in:1,0' ,
                'lsf'                           => 'required|in:1,0' ,
                'back_traffic_alert'            => 'required|in:1,0' ,

            ]);

            if( $car )
            {
                if ( ! $request['is_duplicate'] )
                {
                    $this->update( $request , $car);
                }else
                {

                    ! $request->hasFile('main_image')  ? $request['main_image']  = $car['main_image']  : null;
                    ! $request->hasFile('cover_image') ? $request['cover_image'] = $car['cover_image'] : null;
                    ! $request->hasFile('share_image') ? $request['share_image'] = $car['share_image'] : null;

                    $this->store( $request ) ;
                }

            }else
            {
                $this->store( $request );
            }


        }
    }

    public function store(Request $request)
    {


        $this->authorize('create_cars');

        $data                      = $request->toArray();
        $data['have_discount']     = $request['have_discount'] === "on";
        $data['driving_mode']      = json_encode($data['driving_mode']);
        $data['price_field_value'] = $this->getPriceFieldValue( $data );

        if ($request->file('main_image'))
            $data['main_image'] =  uploadImage( $request->file('main_image') , "Cars");

        if ($request->file('cover_image'))
            $data['cover_image'] = uploadImage( $request->file('cover_image') , "Cars");

        if ($request->file('share_image'))
            $data['share_image'] = uploadImage( $request->file('share_image') , "Cars");

        $this->setCarName($data);

        $car = Car::create($data);

        $car->tags()->attach( $request['tags'] ?? [] );


        if ( ! $request['duplicated_images'] )
        {

            foreach ( $request['colors'] ?? [] as $color )
            {
                $outerImages = $this->uploadCarImages( $color['outer_images'] ?? [] );
                $innerImages = $this->uploadCarImages( $color['inner_images'] ?? [] );

                $car->colors()->attach( $color['id'] , ['outer_images' => json_encode( array_unique($outerImages) ) , 'inner_images' => json_encode( array_unique($innerImages) )  ] );
            }

        }else
        {
            $duplicatedImages = json_decode( $request['duplicated_images'] , true );

            foreach ( $request['colors'] ?? [] as $color )
            {
                $outerImages = array_merge( $this->uploadCarImages( $color['outer_images'] ?? [] ) , $duplicatedImages[ $color['id'] ]['outer_images'] );
                $innerImages = array_merge( $this->uploadCarImages( $color['inner_images'] ?? [] ) , $duplicatedImages[ $color['id'] ]['inner_images'] );

                $car->colors()->attach( $color['id'] , ['outer_images' => json_encode( array_unique($outerImages) ) , 'inner_images' => json_encode( array_unique($innerImages) )  ] );
            }
        }




        $this->storeBrandCarsTypeCount($data['is_new'], $data['brand_id']);

    }

    public function update(Request $request , Car $car)
    {
        $this->authorize('update_cars');

        $data                      = $request->toArray();
        $oldCarColorImages         = json_decode($request['updatedColorsImages'] , true);
        $data['have_discount']     = $request['have_discount'] === "on";
        $data['driving_mode']      = json_encode($data['driving_mode']);
        $data['price_field_value'] = $this->getPriceFieldValue( $data );

        if ($request->file('main_image'))
        {
            deleteImage($data['main_image'],"Cars");
            $data['main_image'] = uploadImage( $request->file('main_image') , "Cars");
        }

        if ($request->file('cover_image'))
        {
            deleteImage($data['cover_image'],"Cars");
            $data['cover_image'] = uploadImage( $request->file('cover_image') , "Cars");
        }

        if ($request->file('share_image'))
        {
            if( $data['share_image'] )
                deleteImage($data['share_image'],"Cars");

            $data['share_image'] = uploadImage( $request->file('share_image') , "Cars");
        }

        $this->setCarName($data);

        $carOldType = $car['is_new'];
        $carOldBrandId = $car['brand_id'];
        $car->update($data);

        $car->tags()->sync( $request['tags'] ?? [] );

        $colors = array_values( $this->cleanColorsArray( $request['colors'] , $oldCarColorImages) );

         foreach ( $colors ?? [] as $color )
        {
            $carImages         = $car->colors->where('id',$color['id'])->pluck('pivot')->first();
            $oldImages         = $oldCarColorImages[ $color['id'] ] ?? [];
            $carOuterImages    = array_key_exists('outer_images',$oldImages) ? json_decode($oldImages['outer_images'] ?? "[]") : json_decode($carImages['outer_images'] ?? "[]");
            $carInnerImages    = array_key_exists('inner_images',$oldImages) ? json_decode($oldImages['inner_images'] ?? "[]") : json_decode($carImages['inner_images'] ?? "[]");
            $outerImages       = [];
            $innerImages       = [];

            if( $color['outer_images'] ?? false )
                $outerImages = $this->uploadCarImages( $color['outer_images'] );

            if( $color['inner_images'] ?? false )
                $innerImages = $this->uploadCarImages( $color['inner_images'] );

            if ($carImages)
                $car->colors()->updateExistingPivot( $color['id'] , ['outer_images' => json_encode( array_unique( array_merge($carOuterImages,$outerImages) ) ), 'inner_images' => json_encode( array_unique( array_merge($carInnerImages,$innerImages) ) ) ] );
            else
                $car->colors()->attach( $color['id'] , ['outer_images' => json_encode( array_unique( array_merge($carOuterImages,$outerImages) ) ), 'inner_images' => json_encode( array_unique( array_merge($carInnerImages,$innerImages) ) ) ] );

        }

        foreach($car->colors->pluck('id') as $colorId)
        {
            if( ! in_array($colorId,array_column($request['colors'],'id')) )
            {
                $car->colors()->detach($colorId);
                foreach(json_decode($car->colors->where('id',$colorId)->first()->pivot->outer_images) as $outerImage)
                {
                    deleteImage($outerImage,"Cars");
                }
                foreach(json_decode($car->colors->where('id',$colorId)->first()->pivot->inner_images) as $innerImage)
                {
                    deleteImage($innerImage,"Cars");
                }
            }
        }

        if( $carOldBrandId == $data['brand_id'] )
        {
            $this->updateBrandCarsTypeCount(action: 'update', oldCarType:$carOldType, currentBrandId: $data['brand_id'], newCarType: $data['is_new']);
        }
        else
            $this->updateBrandCarsTypeCount('update', $carOldType, $carOldBrandId, $data['brand_id'], newCarType: $data['is_new']);

    }

    private  function cleanColorsArray($colors , $oldCarColorImages)
    {
        return array_filter( $colors , fn ($color) => ( $color['inner_images'] ?? false ) || ( $color['outer_images'] ?? false ) || array_key_exists( $color['id'] ,$oldCarColorImages ));
    }

    private function setCarName(&$data)
    {
        $brand    = Brand::find( $data['brand_id'] , ['id','name_ar','name_en']);
        $model    = CarModel::find( $data['model_id'] , ['id','name_ar','name_en']);
        $subModel = CarModel::find( $data['sub_model_id'] , ['id','name_ar','name_en']);


        $data['name_ar'] = $brand->name_ar . ' ' . $model->name_ar. ' ' . $subModel->name_ar . ' ' . $data['year'];
        $data['name_en'] = $brand->name_en . ' ' . $model->name_en. ' ' . $subModel->name_en . ' ' . $data['year'];
    }
    private function uploadCarImages( $images )
    {
        $imagesNames = [];

        foreach ( $images as $index => $image )
        {
            $imagesNames[$index] = uploadImage( $image , "Cars");
        }

        return $imagesNames;
    }

    private function getPriceFieldValue($data) : string
    {
        switch ( $data['price_field_status'] )
        {
            case 'show':
                if(array_key_exists('discount_price',$data)) $value =  "<h6 class='price-before'> <span>".$data['price']."</span> <span class='currency-value' ></span> </h6>
                <h6 class='price-now'> <span class='price-word' ></span>". $data['discount_price'] ."<span class='currency-value' ></span> </h6>";
                else $value =  "<h6 class='price-before'></h6>
                <h6 class='price-now'> <span class='price-word' > </span>". $data['price'] ."<span class='currency-value' ></span> </h6>";
                break;
            case 'competitive_price'       : $value =  "competitive price";
                break;
            case 'unavailable'             : $value =  "unavailable";
                break;
            case 'available_on_request'    : $value =  "available on request";
                break;
            case 'other'                   : $value =  json_encode(['text_ar' => $data['other_text_ar'], 'text_en' => $data['other_text_en']]);
                break;
            default                        : $value = '';
        }
        return $value;

    }

    public function destroy(Request $request , Car $car)
    {
        $this->authorize('delete_cars');

        if ($request->ajax())
        {
            $car->delete();
            $this->updateBrandCarsTypeCount('deletion', $car->is_new, $car->brand_id);
        }

    }

    public function storeBrandCarsTypeCount($carType, $brandId)
    {
            $brand = Brand::find($brandId);

            if($brand->car_available_types != 'both')
            {
                // dd($carType, $brand->car_available_types);
                if($carType == 1)
                {
                    if($brand->car_available_types != 'used' )
                        $brand->update(['car_available_types' => 'new']);
                    else $brand->update(['car_available_types' => 'both']);
                }
                else
                {
                    if($brand->car_available_types != 'new')
                        $brand->update(['car_available_types' => 'used']);
                    else $brand->update(['car_available_types' => 'both']);
                }
            }

    }

    private function updateBrandCarsTypeCount($action, $oldCarType, $currentBrandId, $newBrandId = null, $newCarType = null)
    {
        // dd($currentBrandId, $newBrandId);
        $currentBrand = Brand::find($currentBrandId);
        $currentBrandNewCarsCount = $currentBrand->newCars->count();
        $currentBrandUsedCarsCount = $currentBrand->oldCars->count();

        if(!$newBrandId) // deletion and update carType only
        {
            if($action == 'deletion')
            {
                if($oldCarType == 1) // car is new
                {
                    if($currentBrandNewCarsCount == 0) // delete last new car case
                    {
                        if($currentBrand->car_available_types == 'both')
                            $currentBrand->update(['car_available_types' => 'used']);
                        else $currentBrand->update(['car_available_types' => null]);
                    }
                }
                else // car is used
                {
                    if ($currentBrandUsedCarsCount == 0) // delete last used car case
                    {
                        if ($currentBrand->car_available_types == 'both')
                            $currentBrand->update(['car_available_types' => 'new']);
                        else $currentBrand->update(['car_available_types' => null]);
                    }
                }
            }
            else
            {
                if($oldCarType == 1 && $newCarType == 0) // change from new to used
                {
                    if($currentBrandUsedCarsCount == 1)
                    {
                        if($currentBrandNewCarsCount > 0)
                        {
                            if($currentBrand->car_available_types == 'new')
                                $currentBrand->update(['car_available_types' => 'both']);
                        }
                        else $currentBrand->update(['car_available_types' => 'used']);
                    }
                }
                else if($oldCarType == 0 && $newCarType == 1) // change from used to new
                {
                    // dd('used to new', $currentBrandUsedCarsCount, $currentBrandNewCarsCount);
                    if ($currentBrandNewCarsCount == 1)
                    {
                        if($currentBrandUsedCarsCount > 0)
                        {
                            if ($currentBrand->car_available_types == 'used')
                                $currentBrand->update(['car_available_types' => 'both']);
                        }
                        else $currentBrand->update(['car_available_types' => 'new']);
                    }
                }
            }
        }
        else // update brand or brand and type
        {
            // dd($oldCarType, $newCarType);
            $newBrand = Brand::find($newBrandId);
            $newBrandNewCarsCount = $newBrand->newCars->count();
            $newBrandUsedCarsCount = $newBrand->oldCars->count();

            if($oldCarType == 1 && $newCarType == 0) // change from new to used
            {
                // dd("new to used", $currentBrandNewCarsCount, $newBrandUsedCarsCount);
                if($currentBrandNewCarsCount == 0)
                {
                    switch ($currentBrand->car_available_types)
                    {
                        case 'both':
                            $currentBrand->update(['car_available_types' => 'used']);
                            break;
                        case 'new':
                            $currentBrand->update(['car_available_types' => null]);
                            break;
                    }
                }

                if($newBrandUsedCarsCount == 1)
                {
                    switch ($newBrand->car_available_types)
                    {
                        case 'new':
                            $newBrand->update(['car_available_types' => 'both']);
                            break;
                        case null:
                            $newBrand->update(['car_available_types' => 'used']);
                            break;
                    }
                }

            }
            else if($oldCarType == 1 && $newCarType == 1) // change from new to new
            {
                // dd("new to new", $currentBrandNewCarsCount, $newBrandNewCarsCount);
                echo("new to new ". $currentBrandNewCarsCount. $newBrandNewCarsCount);
                if($currentBrandNewCarsCount == 0)
                {
                    switch ($currentBrand->car_available_types)
                    {
                        case 'both':
                            $currentBrand->update(['car_available_types' => 'used']);
                            break;
                        case 'new':
                            $currentBrand->update(['car_available_types' => null]);
                            break;
                    }
                }

                if($newBrandNewCarsCount == 1)
                {
                    switch ($newBrand->car_available_types)
                    {
                        case 'used':
                            $newBrand->update(['car_available_types' => 'both']);
                            break;
                        case null:
                            $newBrand->update(['car_available_types' => 'new']);
                            break;
                    }
                }
            }
            else if($oldCarType == 0 && $newCarType == 0) // change from used to used
            {
                // dd("used to used", $currentBrandUsedCarsCount, $newBrandUsedCarsCount);
                if($currentBrandUsedCarsCount == 0)
                {
                    switch ($currentBrand->car_available_types)
                    {
                        case 'both':
                            $currentBrand->update(['car_available_types' => 'new']);
                            break;
                        case 'used':
                            $currentBrand->update(['car_available_types' => null]);
                            break;
                    }
                }

                if($newBrandUsedCarsCount == 1)
                {
                    switch ($newBrand->car_available_types)
                    {
                        case 'new':
                            $newBrand->update(['car_available_types' => 'both']);
                            break;
                        case null:
                            $newBrand->update(['car_available_types' => 'used']);
                            break;
                    }
                }
            }
            else if($oldCarType == 0 && $newCarType == 1) // change from used to new
            {
                // dd("used to new", $currentBrandUsedCarsCount, $newBrandNewCarsCount);
                if($currentBrandUsedCarsCount == 0)
                {
                    switch ($currentBrand->car_available_types)
                    {
                        case 'both':
                            $currentBrand->update(['car_available_types' => 'new']);
                            break;
                        case 'used':
                            $currentBrand->update(['car_available_types' => null]);
                            break;
                    }
                }

                if($newBrandNewCarsCount == 1)
                {
                    switch ($newBrand->car_available_types)
                    {
                        case 'used':
                            $newBrand->update(['car_available_types' => 'both']);
                            break;
                        case null:
                            $newBrand->update(['car_available_types' => 'new']);
                            break;
                    }
                }
            }
        }
    }


}
