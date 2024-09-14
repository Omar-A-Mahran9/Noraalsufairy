<?php

namespace App\Http\Controllers\API;



use App\Models\City;
use App\Models\Brand;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AppointmentService;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Traits\NotificationTrait;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
class AppointmentController extends Controller
{
    use NotificationTrait;

    public $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function index(Request $request)
    {

        $this->authorize('view_appointments');

        if ($request->ajax())
        {
            $data = getModelData( model : new Appointment() );

            return response()->json($data);
        }

        return view('dashboard.appointments.index');
    }

    public function formData()
    {
        $brandsWithModels = Brand::whereHas('cars')->get()->map(function($brand){
            return [
                "id" => $brand->id,
                "name" => $brand->name,
                "models" => $brand->parentModels->map(function($model){
                    return [
                        'id' => $model->id,
                        'name' => $model->name,
                    ];
                }),
            ];
        });

        $citiesWithBranches = City::has('branches')->with('branches')->whereHas('branches',function($query){
            $query->where('type','maintenance_center')->orWhere('type', '3s_center')->whereHas('schedule');
        })->get()->map(function($city){
            return [
                "id" => $city->id,
                "name" => $city->name,
               "branches" => $city->branches->filter(function($branch) {
                return $branch->type === 'maintenance_center' || $branch->type === '3s_center';
            })->map(function($branch){
                    return [
                        'id' => $branch->id,
                        'name' => $branch->name,
                        'available_days' => $branch->schedule->where('is_available',1)->pluck('day_of_week')

                    ];
                }),
            ];
        });

        return response()->json([
            "days_of" => Schedule::whereIsAvailable(false)->get()->pluck('day_of_week')->toArray(),
            "start_date" => now()->format('Y-m-d'),
            "end_date" => now()->addMonths(2)->format('Y-m-d'),
            "brands" => $brandsWithModels,
            "cities" => $citiesWithBranches,
        ]);
    }

    public function store(StoreAppointmentRequest $request)
    {

      

        $appointment = $this->appointmentService->store($request);
        $this->newAppointmentNotification($appointment);
     // Send SMS reminder
     $formattedPhone = formatSaudiPhoneNumber($appointment->phone);

     SendMaintenanceReminder(
        $formattedPhone,
        $appointment->appointment_number,
        $appointment->appointment_date,
        $appointment->appointment_time,
        $appointment->center
    );

        try {
            Mail::send('mails.maintenance',[ 'appointment' =>  $appointment, 'branch_mail' => 1 ],function($message) use($appointment){
                $message->to($appointment->branch->email)->subject(__('New maintenance appointment'));
            });
            Mail::send('mails.maintenance',[ 'appointment' =>  $appointment ],function($message) use($appointment){
                $message->to($appointment->email)->subject(__('Maintenance appointment details'));
            });
        } catch (\Throwable $th) {
            return ($th->getMessage()) ;
        }

        if($appointment == null)
        {
            throw ValidationException::withMessages([
                'time' => __("This time is reserved")
            ]);

        }

        return response()->json(new AppointmentResource($appointment));
    }

}
