<?php

namespace App\Http\Requests;

use App\Models\Building;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->routeIs('payment.store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tenant_id' => 'required|exists:users,id',
            'building_id' => 'required|exists:rent_properties,id',
            'month' => 'required|date_format:Y-m',
            'payment_type' => 'required|in:Deposit,Rent,Sell,Due',
            'amt_paid' => 'required|numeric|min:0',
            'payment_mode' => 'required|in:Cash,Cheque,Remaining',
            'remarks' => 'nullable|string',
        ];
    }
}
