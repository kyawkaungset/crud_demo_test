<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // 'name' => 'required'
        // 'username' => 'unique:users'
        // 'age' => 'numeric'
        // 'quantity' => 'integer'
        // 'title' => 'string'
        // 'email' => 'email'
        // 'password' => 'min:8'
        // 'height' => 'max:100'
        // 'status' => 'not_in:pending'
        // 'birth_date' => 'date'
        // 'options' => 'array'
        // 'profile_picture' => 'image'
        // 'photo' => 'file'
        // 'is_active' => 'boolean'
        // 'optional_field' => 'nullable|string'
        // 'password' => 'confirmed'
        // 'role' => 'in:admin,user,editor'
        // 'age' => 'between:18,60'
        // 'date' => 'date_format:Y-m-d'
        // 'password' => 'different:username'
        // 'pin' => 'digits:4'
        // 'phone' => 'digits_between:10,12'
        // 'avatar' => 'dimensions:min_width=100,min_height=200'
        // 'price' => 'gt:discounted_price'
        // 'quantity' => 'gte:min_quantity'
        // 'ip_address' => 'ip'
        // 'ipv4_address' => 'ipv4'
        // 'ipv6_address' => 'ipv6'
        // 'data' => 'json'
        // 'discounted_price' => 'lt:original_price'
        // 'available_quantity' => 'lte:max_quantity'

        return [
            'name' => ['required'],
            'gender' => ['required', 'string', 'in:Male,Female,Others'],
        ];

    }

    /**
     * Get custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'The name field is required!',
            'gender.required' => 'The gender field is required!',
        ];
    }
}
