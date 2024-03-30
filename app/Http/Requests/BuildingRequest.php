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
            'description'   =>  'required | string | min:3 | max:500',
            'image-1' => $rule . '|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image-4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no-of-floors' => 'required|integer',
            'address'   =>  'required | string | min:3 | max:150',
        ];
    }
}