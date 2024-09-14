<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\Color;
use App\Models\Tag;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

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
            $request->validate([
                'brand_id' => ['required'],
                'model_id' => ['required'],
                'year' => ['required'],
                'status' => ['required'],
            ]);

        }elseif ($request['step'] == 2) {
            $discountPrice = $request['discount_price'] ?? 0;
            $price         = $request['price'] ?? 0;

            if($car)
            {
                $request->validate([
                    // 'kilometers' => ['required', 'numeric', 'nullable', 'min:1'],
                    'main_image'  => [ 'nullable', 'image'],
                    // 'cover_image' => [ 'nullable', 'image'],
                    // 'share_image' => ['nullable' , 'image'],
                    'other_text_ar' => ['required_if:price_field_status,other','nullable','string','max:255'],
                    'other_text_en' => ['required_if:price_field_status,other','nullable','string','max:255'],
                    'description_ar' => ['required' , 'string'],
                    'description_en' => ['required' , 'string'],
                    'sub_model_ar' => 'required | string|max:255',
                    'sub_model_en' => 'required | string|max:255',
                    'price' => 'required | numeric|lte:2147483647|not_in:0|gt:' . $discountPrice,
                    'discount_price' => 'required_with:have_discount|nullable|numeric|not_in:0|lt:' . $price,
                    'price_field_status' => ['required' , 'string'],
                    'colors'      => ['required','array','min:1'],
                    'car_style'          => 'required|string' ,
                    'maximum_force'      => 'required|string|max:255' ,
                    'fuel_consumption'   => 'required|string|max:255' ,
                    'seats_number'       => 'required|integer' ,
                    'engine_type'        => 'required|string|max:255' ,
                    'traction_type'      => 'required|string' ,
                    'Motion_vector'      => 'required|string' ,
                    'upholstered_seats' => 'required|string|max:255' ,
                ]);

                if ( ! $request['is_duplicate'] )
                {
                    $this->update( $request, $car );
                }else
                {

                    ! $request->hasFile('main_image')  ? $request['main_image']  = $car['main_image']  : null;

                    $this->duplicate( $request ) ;
                }

            }
            else
            {
                $request->validate([
                    // 'cars.*.kilometers' => ['required', 'numeric', 'nullable', 'min:1'],
                    'cars.*.main_image'  => [ 'required' , 'image'],
                    // 'cars.*.cover_image' => [ 'required' , 'image'],
                    // 'cars.*.share_image' => ['nullable' , 'image'],
                    'cars.*.other_text_ar' => ['required_if:price_field_status,other','nullable','string','max:255'],
                    'cars.*.other_text_en' => ['required_if:price_field_status,other','nullable','string','max:255'],
                    'cars.*.description_ar' => ['required' , 'string'],
                    'cars.*.description_en' => ['required' , 'string'],
                    'cars.*.sub_model_ar' => 'required | string|max:255',
                    'cars.*.sub_model_en' => 'required | string|max:255',
                    'cars.*.price' => 'required | numeric|lte:2147483647|not_in:0|gt:' . $discountPrice,
                    'cars.*.discount_price' => 'required_with:have_discount|numeric|not_in:0|lt:cars.*.price',
                    'cars.*.price_field_status' => ['required' , 'string'],
                    'cars.*.colors'      => ['required','array','min:1'],
                    'cars.*.car_style'          => 'required|string' ,
                    'cars.*.maximum_force'      => 'required|string|max:255' ,
                    'cars.*.fuel_consumption'   => 'required|string|max:255' ,
                    'cars.*.seats_number'       => 'required|integer' ,
                    'cars.*.engine_type'        => 'required|string|max:255' ,
                    'cars.*.traction_type'      => 'required|string' ,
                    'cars.*.Motion_vector'      => 'required|string' ,
                    'cars.*.upholstered_seats' => 'required|string|max:255' ,
                ]);
                $this->store( $request );
            }
        }

    }

    public function store(Request $request)
    {
        $this->authorize('create_cars');
        $data = $request->toArray();
        foreach($data['cars'] as $key => $carData)
        {
            $carData['main_image'] =  uploadImage( $carData['main_image'] , "Cars");
            $carData["brand_id"] = $request['brand_id'];
            $carData['model_id'] = $request['model_id'];
            $carData['year'] = $request['year'];
            $carData['status'] = $request['status'];
            $carData['have_discount']     = $request['have_discount'] === "on";
            $carData['price_field_value'] = $this->getPriceFieldValue( $carData );

            $this->setCarName($carData);

            $car = Car::create($carData);

            $car->colors()->attach( $carData['colors'] );
        }
    }

    public function duplicate(Request $request)
    {
        $this->authorize('create_cars');
        $data = $request->toArray();
        $data['have_discount']     = $request['have_discount'] === "on";
        $data['price_field_value'] = $this->getPriceFieldValue( $data );

        if($request->hasFile('main_image'))
            $data['main_image'] =  uploadImage( $data['main_image'] , "Cars");


        $this->setCarName($data);

        $car = Car::create($data);

        $car->colors()->attach( $data['colors'] );
    }

    public function update(Request $request , Car $car)
    {
        $this->authorize('update_cars');

        $data                      = $request->toArray();
        $data['have_discount']     = $request['have_discount'] === "on";
        $data['price_field_value'] = $this->getPriceFieldValue( $data );

        if ($request->file('main_image'))
        {
            deleteImage($data['main_image'],"Cars");
            $data['main_image'] = uploadImage( $request->file('main_image') , "Cars");
        }


        $this->setCarName($data);

        $car->update($data);

        $car->colors()->sync( $request['colors'] );

    }


    private function setCarName(&$data)
    {
        $brand    = Brand::find( $data['brand_id'] , ['id','name_ar','name_en']);
        $model    = CarModel::find( $data['model_id'] , ['id','name_ar','name_en']);

        $data['name_ar'] = $brand->name_ar . ' ' . $model->name_ar . ' ' . $data['sub_model_ar'] . ' ' . $data['year'];
        $data['name_en'] = $brand->name_en . ' ' . $model->name_en . ' ' . $data['sub_model_en'] . ' ' . $data['year'];
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
        }

    }

    public function excel()
    {
        // Load users
        $cars = Car::with('brand')->select('id', 'brand_id', 'name_ar', 'name_en', 'price_field_value', 'price_field_status')->get();

        return (new FastExcel($cars->map(function($car){
            return [
                __('Car name') => $car->name,
                __('Price') => $car->price_field_status != 'show' ? __($car->price_field_value) : $car->selling_price_after_vat ,
                __('Brand') => $car->brand->name,
            ];
        })))->download('cars.xlsx');
    }

}
