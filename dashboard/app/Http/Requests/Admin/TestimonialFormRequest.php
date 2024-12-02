<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialFormRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id', // Customer must exist in the customers table
            'product_id' => 'required|exists:products,id', // Product must exist in the products table
            'rating' => 'required|integer|between:1,5', // Rating should be an integer between 1 and 5
            'comment' => 'required|string|max:500', // Comment should be a string with max length 500
            'content' => 'nullable|string', 
        ];
    }
}
