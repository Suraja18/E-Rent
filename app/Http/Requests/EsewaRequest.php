<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EsewaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->routeIs('tenant.esewa.pay', 'tenant.khalti.pay');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'building_id' => 'required|exists:rented_properties,id',
            'amt_paid' => 'required|numeric|min:0',
            'payment_type' => 'required|in:Deposit,Rent,Sell',
            'month' => 'nullable|date_format:Y-m',
            'remarks' => 'nullable|string',
        ];
    }
}
