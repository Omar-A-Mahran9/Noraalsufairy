<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\Status;

use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Rap2hpoutre\FastExcel\FastExcel;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $this->authorize('view_orders');

        if ($request->ajax())
        {
            $data = getModelData( model : new Order() , relations :  [ 'employee' => ['id','name'], 'status' => ['id', 'name_ar', 'name_en'] ]);

            return response()->json($data);
        }

        $statuses = Status::select('id', 'name_en', 'name_ar')->get();

        return view('dashboard.orders.index', compact('statuses'));
    }



    public function show(Order $order)
    {
        $this->authorize('show_orders');
        $statuses = Status::get();
        $order->load(['car', 'city']);

        if(!$order->opened_at) {
            $order->update([
                "opened_at" => Carbon::now()->toDateTimeString(),
                "opened_by" => auth()->id()
            ]);
        }

        return view('dashboard.orders.show',compact('order', 'statuses'));
    }



    public function destroy(Request $request, Order $order)
    {
        $this->authorize('delete_orders');

        if($request->ajax())
        {
            $order->delete();
        }
    }

    public function changeStatus(Order $order , Request $request)
    {
        $request->validate(['status_id' => 'required|exists:statuses,id']);

        OrderHistory::create([
            'status_id' => $request['status_id'],
            'comment' => $request['comment'],
            'employee_id' => auth()->id(),
            'order_id' => $order['id'],
        ]);

        $order->update(['status_id' => $request['status_id'] ]);
    }

    public function excel()
    {
        // Load users
        $orders = Order::with('employee', 'status', 'employee','city','bank','car')->select('id', 'salary','name', 'phone', 'price', 'type', 'opened_by', 'created_at', 'opened_at', 'status_id','salary_identification','commitments','work','bank_id','car_id','city_id','payment_type')->orderBy('created_at', 'DESC')->get();
 
        return (new FastExcel($orders->map(function($order){
             return [
                __('name') => $order->name ?? '-',
                __('phone') => $order->phone,
                __('Salary') => $order->salary,
                __('Commitments') => $order->commitments,
                __('Work') => $order->work,
                __('bank') => $order->bank?__($order->bank->name) : '-',
                __('city') => $order->city? __($order->city->name) : '-',
                __('Payment Type') => __($order->payment_type),
                __('car') => $order->car? __($order->car->name) : '-',
                __('price') => $order->price,
                __('type') => __($order->type),
                __('status') => $order->status ? __($order->status->name) : '-',
    
            ];
        })))->download('orders.xlsx');
    }
}
