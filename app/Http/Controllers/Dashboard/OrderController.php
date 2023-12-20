<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderHistory;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $this->authorize('view_orders');

        if ($request->ajax())
        {
            $data = getModelData( model : new Order() , relations :  [ 'employee' => ['id','name'] ]  );

            return response()->json($data);
        }

        return view('dashboard.orders.index');
    }



    public function show(Order $order)
    {

        $this->authorize('show_orders');

        $order->load('car');
        if( ! $order->opened_at )
        {

            try {

                $order->update([
                    "opened_at" => Carbon::now()->toDateTimeString(),
                    "opened_by" => auth()->id()
                ]);

            } catch (\Throwable $th) {
                return $th;
            }
        }

        return view('dashboard.orders.show',compact('order'));
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
        $request->validate(['status' => 'required']);

        DB::beginTransaction();

        try {

            OrderHistory::create([
                'status' => $request['status'],
                'comment' => $request['comment'],
                'employee_id' => auth()->id(),
                'order_id' => $order['id'],
            ]);



            $order->update(['status' => $request['status'] ]);

            DB::commit();

        }catch (\Exception $exception)
        {
            DB::rollBack();
        }
    }
}
