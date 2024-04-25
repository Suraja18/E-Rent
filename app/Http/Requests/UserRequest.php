<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'phone_number' => 'nullable|numeric|digits_between:9,10|unique:users,phoneNumber',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'address' => 'nullable|string',
            'gender' => ['nullable', 'string', Rule::in(['Male', 'Female'])],
            'roles' => 'required|integer|in:1,2',
        ];
    }
}
