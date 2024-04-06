<?php

namespace App\Http\Requests;

use App\Models\Unit;
use Illuminate\Foundation\Http\FormRequest;

class RentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->routeIs('rent.store', 'rent.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = $this->routeIs('rent.store') ? 'required' : 'nullable';
        return [
            'rent_name' => 'required|string|min:3|max:50',
            'property_type_id' => [
                                    'required',
                                    'string',
                                    function ($attribute, $value, $fail) {
                                        $unit = Unit::where('id', $value)->first();
                                        if (!$unit) {
                                            $fail('The selected property type is invalid.');
                                        }
                                    }
                                ],
            'building_id' => 'required|exists:buildings,id',
            'forum_id' => 'required|exists:forums,id',
            'floor' => 'required|numeric|min:0|max:200',
            'area' => 'required|numeric|min:0|max:10000000',
            'no_of_bed' => 'required|numeric|min:0|max:200',
            'monthly_house_rent' => 'required|numeric|min:0|max:10000000000000',
            'image_1' => $rule . '|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|min:3|max:50000',
            'electric_charge' => 'required|numeric|min:0|max:100000000000',
            'water_charge' => 'required|numeric|min:0|max:100000000000',
            'garbage_charge' => 'required|numeric|min:0|max:100000000000',
            'status' => 'nullable|in:on',
        ];
    }
}
