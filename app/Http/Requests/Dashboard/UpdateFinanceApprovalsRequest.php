<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFinanceApprovalsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_finance_approvals');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'order_id' => 'required|exists:orders,id',
            'approval_date' => 'required|date',
            'approval_amount' => 'required|numeric|between:0,999999.99',
            'tax_discount' => 'required|numeric|between:0,999999.99',
            'discount_percent' => 'required|numeric|between:0,999999.99',
            'discount_amount' => 'required|numeric|between:0,999999.99',
            'cashback_percent' => 'required|numeric|between:0,999999.99',
            'cashback_amount' => 'required|numeric|between:0,999999.99',
            'cashback_amount' => 'required|numeric|between:0,999999.99',
            'cost' => 'required|numeric|between:0,999999.99',
            'plate_no_cost' => 'required|numeric|between:0,999999.99',
            'insurance_cost' => 'required|numeric|between:0,999999.99',
            'delivery_cost' => 'required|numeric|between:0,999999.99',
            'commission' => 'nullable|numeric|between:0,999999.99',
            'profit' => 'required|numeric|between:0,999999.99',
            'extra_details' => 'nullable|string',
            'delegate_id' => 'required|exists:delegates,id',
        ];
    }
}
