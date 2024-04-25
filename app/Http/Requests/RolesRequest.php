<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->routeIs('roles.store', 'roles.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule = $this->routeIs('roles.store') ? 'required' : 'nullable';
        $rule2 = $this->routeIs('roles.store') ? '|unique:user_roles' : '';
        return [
            'user_roles' => 'required|string|max:12'.$rule2,
            'roles' => 'required|string|max:255',
            'description' => 'required|string|min:25',
            'image_1' =>  $rule . '|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'processes_that_pay_off' => 'required|string|max:600',
        ];
    }
}
