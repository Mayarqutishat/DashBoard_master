<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CustomerFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // You can add authorization logic here if needed (e.g., check user roles)
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
            'email' => 'required|email|unique:customers,email,' . $this->route('customer'),
            'phone' => 'nullable|numeric|digits_between:10,15',
            'address' => 'nullable|string|max:255',
            'age' => 'nullable|integer|min:18',
            'gender' => 'nullable|in:male,female,other',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' assumes there's a 'password_confirmation' field
        ];
    }
}
