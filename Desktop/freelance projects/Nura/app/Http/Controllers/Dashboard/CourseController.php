<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\CoursesStatus;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Employee;
use Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Opis\Closure\SecurityException;

class CourseController extends Controller
{
 
    public function index(Request $request)
    {
        $this->authorize('view_courses');

        if ( $request->ajax() ) {

            $courses = getModelData( model: new Course() );

            return  response()->json($courses);
        }
        return view('dashboard.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all(); // Assuming you want to fetch all employees
        $status = CoursesStatus::values(); // Fetch enum cases.  sections
      // Correct way to retrieve session data
        $section =session('sections')??[];
        $this->authorize('create_courses');
     
            return view('dashboard.courses.create',compact('employees','status','section'));
    }

  
    public function store(Request $request)
    {
        if ($request->file('images')) {
            $data['images'] = uploadImage($request->file('images'), "course");
        }
        
        $coursedata = [
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'preview_video_path' => $request->video_url,
            'discount_price' => $request->discount_price === 'on' ? 1 : 0,
            'have_discount' => $request->have_discount,
            'price' => $request->price,
            'discount_duration_days_counts' => $request->discount_duration_days_counts,
            'images' => $data['images'] ?? null, // Use uploaded image path or default to null
            'status' => $request->status,
            'from' => $request->from,
            'to' => $request->to,
            'open' => $request->open,
            'created_by'=>Auth::user()->id,
            'assign_to'=>$request->assign_to,
        ];
         $course = Course::create($coursedata);
       
        $sections = $request->sections_list; // Retrieve the sections list from the request

        if (is_array($sections) && count($sections) > 0) {
            foreach ($sections as $section) {
                // Assuming each section contains a 'name' and 'description'
                $sectionData = [
                    'course_id'=>$course->id,
                    'lock'=>1,
                    'name_ar' => $section['name_ar'] ?? 'Default Name', // Fallback to default if 'name' is not set
                    'name_en' => $section['name_en'] ?? 'Default Name', // Fallback to default if 'name' is not set
                    'description_ar' => $section['description_ar'] ?? 'No description available',
                    'description_en' => $section['description_en'] ?? 'No description available',
                ];
        
                // Example: Save section data to the database
                // Section::create($sectionData);
            }
        } else {
            // Handle case where sections_list is empty or not an array
            return response()->json(['message' => 'No sections provided.'], 400);
        }

      }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    public function validateStep( Request $request , Course $course = null)
    {

        if ($request['step'] == 1) {

            $discountPrice = $request['discount_price'] ?? 0;
            $price         = $request['price'] ?? 0;

            $request->validate([
                'name_ar' => ['required' , 'string','max:255'],
                'name_en' => ['required' , 'string','max:255'],
                'images'   => 'required|mimes:webp,png,jpg|max:2048' ,
                'video_url' => ['required','nullable' , 'string','url'],
                'price' => 'required | numeric|lte:2147483647|not_in:0|gt:' . $discountPrice,
                'discount_price' => 'required_with:have_discount|nullable|numeric|not_in:0|lt:' . $price,
                'discount_duration_days_counts' => 'required_with:have_discount|nullable|numeric',
                'assign_to' => ['required'],
                'from' => ['required','date'],
                'to' => ['required','date'],
                'description_ar' => ['required' , 'string'],
                'description_en' => ['required' , 'string'],
                // 'status' => ['required'],
     
            ]);

        }elseif ($request['step'] == 2) {
            $request->validate([
                'sections_list'                                  => [ 'required' ,'array'],
                'sections_list.*.name_ar'                        => [ 'required' ],
                'sections_list.*.name_en'                        => [ 'required' ],
                'sections_list.*.description_ar'                     => [ 'required' ],
                'sections_list.*.description_en'                     => [ 'required' ],
            ]);
            session()->forget('sections');
            session(['sections' => $request->input('sections_list')]);
        }elseif ($request['step'] == 3) {
            if ($request->show_video_material == 0 && $request->show_attachment_material == 0) {
                return $this->validationFailure([
                    'message' => __('At least one material option must be selected (video or attachment)'),
                ]);
            }
            
               $request->validate([
  
                    // Ensure both fields are boolean
                    'show_video_material' => ['boolean'],
                    'show_attachment_material' => ['boolean'],
                
                    // Ensure at least one of them is selected
                    'show_video_material' => ['required_without:show_video_material'],
                    'show_attachment_material' => ['required_without:show_video_material'],
              
            
                // Section and type fields for videos
                'section_id_video' => ['required_if:show_video_material,1'], // Required if video material is selected
                'type_video' => ['required_if:show_video_material,1'],
                'videos_list' => ['required_if:show_video_material,1', 'array'], // Required if video material is selected
                'videos_list.*.video_path' => [ 'required_if:show_video_material,1'], // URL required if file is not uploaded
            
                // Section and type fields for attachments
                'section_id_material' => ['required_if:show_attachment_material,1'], // Required if attachment material is selected
                'type_material' => ['required_if:show_attachment_material,1'],
                // Validation for file list
                'file_list' => ['required_if:show_attachment_material,1', 'array'], // Required if attachment material is selected
                'file_list_*_file_path' => [
                   'required'
                ], // URL required if file is not uploaded
                
            ]);

        }elseif ($request['step'] == 4) {
         $request->validate([
       
           'outcome_list'                                  => [ 'required' ,'array'],
           'outcome_list.*.description_ar'                     => [ 'required' ],
           'outcome_list.*.description_en'                     => [ 'required' ],
           
            ]);

            // if( $car )
            // {
            //     if ( ! $request['is_duplicate'] )
            //     {
            //         $this->update( $request , $car);
            //     }else
            //     {

            //         ! $request->hasFile('main_image')  ? $request['main_image']  = $car['main_image']  : null;
            //         ! $request->hasFile('cover_image') ? $request['cover_image'] = $car['cover_image'] : null;
            //         ! $request->hasFile('share_image') ? $request['share_image'] = $car['share_image'] : null;

            //         $this->store( $request ) ;
            //     }

            // }else
            // {
            // }
 
                $this->store( $request );

     



        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }

    public function getupdateddata(){
        $section =session('sections')??[];
        return response()->json([
            'success' => true,
            'data' => $section // Send the sections data back to the frontend
        ]);    }
}
