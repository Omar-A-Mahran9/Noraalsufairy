<?php

namespace App\Http\Controllers\Dashboard;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\City;
use App\Models\Brand;
use App\Models\Branch;
use App\Models\CarModel;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AppointmentService;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {

        $this->authorize('view_orders');

        if ($request->ajax())
        {
            $data = getModelData( model : new Appointment(), relations: ['model' => ['id' , 'name_' . getLocale() ]]);

            return response()->json($data);
        }

        return view('dashboard.appointments.index');
    }

    public function create()
    {
        $brands = Brand::whereHas('cars')->get();
        $cities = City::whereHas('branches', function($query){
            $query->where(function($q){
                $q->where('type', 'maintenance_center')->orWhere('type', '3s_center');
            })->has('schedule');
        })->get();
        $daysOff = Schedule::whereIsAvailable(false)->get()->pluck('day_of_week')->toArray();

        return view('dashboard.appointments.create', compact('brands', 'cities', 'daysOff'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = (new AppointmentService())->store($request);

        try {
            Mail::send('mails.maintenance',[ 'appointment' =>  $appointment, 'branch_mail' => 1 ],function($message) use($appointment){
                $message->to($appointment->branch->email)->subject(__('New maintenance appointment'));
            });
            Mail::send('mails.maintenance',[ 'appointment' =>  $appointment ],function($message) use($appointment){
                $message->to($appointment->email)->subject(__('Maintenance appointment details'));
            });
        } catch (\Throwable $th) {
            dd($th->getMessage()) ;
        }

        return response()->json(["appointment created successfully"]);
    }

    public function edit(Appointment $appointment)
    {
        $brands = Brand::whereHas('cars')->get();
        $cities = City::whereHas('branches', function($query){
            $query->where(function($q){
                $q->where('type', 'maintenance_center')->orWhere('type', '3s_center');
            })->has('schedule');
        })->get();
        $branches = Branch::whereCityId($appointment->city_id)->get();
        $daysOff = Schedule::whereBranchId($appointment->branch_id)->whereIsAvailable(false)->get()->pluck('day_of_week')->toArray();
        $carModels = CarModel::get();

        return view('dashboard.appointments.edit', compact('appointment', 'brands', 'branches', 'cities', 'daysOff', 'carModels'));
    }

    public function update(StoreAppointmentRequest $request, Appointment $appointment)
    {
        $time = Carbon::createFromFormat('h:i A',$request->time);
        $data = $request->validated();
        $data['time'] = $time->format('H:i');

        $appointment->update($data);

        try {
            Mail::send('mails.maintenance',[ 'appointment' =>  $appointment, 'branch_mail' => 1 ],function($message) use($appointment){
                $message->to($appointment->branch->email)->subject(__('New maintenance appointment'));
            });
            Mail::send('mails.maintenance',[ 'appointment' =>  $appointment ],function($message) use($appointment){
                $message->to($appointment->email)->subject(__('Maintenance appointment details'));
            });
        } catch (\Throwable $th) {
            dd($th->getMessage()) ;
        }

        return response()->json(["appointment updated successfully"]);
    }

    public function show(Appointment $appointment)
    {
        $cars = Car::get();
        $cities = City::get();
        $branches = Branch::whereCityId($appointment->city_id)->get();
        $daysOff = Schedule::whereIsAvailable(false)->get()->pluck('day_of_week')->toArray();

        return view('dashboard.appointments.show', compact('appointment', 'cars', 'branches', 'cities', 'daysOff'));
    }

    public function changeStatus(Request $request, Appointment $appointment)
    {
        $appointment->update(['status' => $request->status]);

        return response()->json("changed successfully");
    }
}
