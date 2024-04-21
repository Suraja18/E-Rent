<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->routeIs('press.store', 'press.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = $this->routeIs('press.store') ? 'required' : 'nullable';
        return [    
            'heading'   =>  'required | string | min:3 | max:150',
            'description'   =>  'required | string | min:3 | max:50000',
            'image_1' => $rule . '|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|in:Press,Media,News', 
        ];
    }
}
