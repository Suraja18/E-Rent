<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->routeIs('user.completeRegister');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|string|min:3|max:50',
            'lastName' => 'required|string|min:3|max:50',
            'phoneNumber' => 'nullable|numeric|digits_between:9,10|unique:users,phoneNumber',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Address' => 'nullable|string',
            'ZIP' => 'nullable|string',
            'roles' => 'required|integer|in:0,1,2',
        ];
    }
}
