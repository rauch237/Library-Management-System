<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'gender'=>'nullable|string',
            'address'=>'required|string',
            'phone' => 'required|min:11|max:11|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.string' => 'The name must be a valid text.',
            'name.max' => 'The name cannot exceed 255 characters.',
            'email.required' => 'An email address is required to register.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'The email address cannot exceed 255 characters.',
            'email.unique' => 'This email is already registered. Please use a different one.',
            'password.required' => 'A password is required.',
            'password.min' => 'Your password must be at least 8 characters long.',
            'address.required'=> 'Please enter your address',
            'address.string' => 'address must be in a valid text',
            'phone.required' => 'Please enter your phone number',
            'phone.min' => 'Phone number should not be less than 11 digits',
            'phone.max' => 'Phone number should not be more than 11 digits',
            'phone.unique' => 'Phone number is already registered. Make use of another one'
        ];
    }
}
