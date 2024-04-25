<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->routeIs('building.store', 'building.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = $this->routeIs('building.store') ? 'required' : 'nullable';
        return [
            
            'name'   =>  'required | string | min:3 | max:50',
            'description'   =>  'required | string | min:3 | max:50000',
            'image_1' => $rule . '|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'no_of_floors' => 'required|integer|min:0|max:200',
            'room_per_floor' => 'required|integer|min:0|max:200',
            'address'   =>  'required | string | min:3 | max:150',
            'google_maps_link'   =>  'required | string | min:3 | max:50000',
        ];
    }
}
