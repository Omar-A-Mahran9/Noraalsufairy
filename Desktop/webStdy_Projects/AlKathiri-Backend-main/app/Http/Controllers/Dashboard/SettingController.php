<?php

namespace App\Http\Controllers\Dashboard;

use App\Rules\NotUrl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSettingsRequest;
use App\Models\RevSlider;
use App\Models\Status;

class SettingController extends Controller
{
    public function index()
    {
        $this->authorize('view_settings');
        $statuses = Status::get();
        return view('dashboard.settings', compact('statuses'));
    }

    public function store( StoreSettingsRequest $request )
    {

        $data = $request->validated();
        $data['phone'] = convertArabicNumbers($data['phone']);
        $data['whatsapp'] = convertArabicNumbers($data['whatsapp']);

        $this->validateFiles('contact_us_section_photo','about-website',$request,$data);
        $this->validateFiles('logo','general',$request,$data);
        $this->validateFiles('favicon','general',$request,$data);

        Status::updateStatuses($request->orders_statuses);
        unset($data["orders_statuses"]);

        foreach ( $data as $key => $value )
            settings()->set( $key , $value);

    }

    private function validateFiles($keyName , $sectionName , Request $request , &$data)
    {
        if(! settings()->get($keyName))
        {
            $request->validate([
                $keyName   => [ 'bail' , "required_if:setting_type,$sectionName", 'image', 'mimes:jpeg,jpg,png,gif,svg,webp', 'max:4096',  'nullable' ],
            ]);
        }


        if($request->hasFile($keyName))
        {
            $request->validate([
                $keyName   => [ 'bail' ,'image', 'mimes:jpeg,jpg,png,gif,svg,webp', 'max:4096' ]
            ]);
            $data[$keyName] = uploadImage( $request->file($keyName) , "Settings");
        }

    }

    public function changeLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
