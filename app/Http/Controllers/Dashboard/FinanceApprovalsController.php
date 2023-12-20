<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreFinanceApprovalsRequest;
use App\Http\Requests\Dashboard\UpdateFinanceApprovalsRequest;
use App\Models\Delegate;
use App\Models\FinanceApproval;
use App\Models\Order;
use Illuminate\Http\Request;

class FinanceApprovalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view_finance_approvals');
        if ($request->ajax()) {
            $delegates = getModelData(model: new FinanceApproval());
            return response()->json($delegates);
        }
        return view('dashboard.finance_approvals.index');
    }

    public function create(Request $request)
    {
        $this->authorize('create_finance_approvals');
        if ($request->ajax()) {
            $order = Order::with('city', 'car.color', 'bank')->find($request->order_id);
            return response()->json($order);
        }
        $orders = Order::get();
        $delegates = Delegate::get();
        return view('dashboard.finance_approvals.create', compact('orders', 'delegates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFinanceApprovalsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFinanceApprovalsRequest $request)
    {
        $this->authorize('create_finance_approvals');
        $data = $request->validated();
        FinanceApproval::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinanceApprovals  $financeApprovals
     * @return \Illuminate\Http\Response
     */
    public function show(FinanceApproval $financeApproval)
    {
        $this->authorize('show_finance_approvals');
        $financeApproval->load('delegate');
        $financeApproval->load('order.city');
        $financeApproval->load('order.bank');
        $financeApproval->load('order.car.color');
        return view('dashboard.finance_approvals.show', compact('financeApproval'));
    }

    public function edit(FinanceApproval $financeApproval)
    {
        $this->authorize('update_finance_approvals');
        $financeApproval->load('order.city');
        $financeApproval->load('order.bank');
        $financeApproval->load('order.car.color');

        $orders = Order::get();
        $delegates = Delegate::get();
        return view('dashboard.finance_approvals.edit', compact('delegates', 'orders', 'financeApproval'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFinanceApprovalsRequest  $request
     * @param  \App\Models\FinanceApprovals  $financeApprovals
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFinanceApprovalsRequest $request, FinanceApproval $financeApproval)
    {
        $this->authorize('update_finance_approvals');
        // $data = $request->validated();
        $financeApproval->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinanceApprovals  $financeApprovals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FinanceApproval $financeApproval)
    {
        $this->authorize('delete_finance_approvals');

        if ($request->ajax()) {
            $financeApproval->delete();
        }
    }
}
