<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Allow all authorized users to access
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'total_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|in:pending,processed,shipped,completed,canceled', // Example statuses
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_id.required' => 'The customer is required.',
            'customer_id.exists' => 'The selected customer does not exist.',
            'product_id.required' => 'The product is required.',
            'product_id.exists' => 'The selected product does not exist.',
            'total_price.required' => 'The total price is required.',
            'total_price.numeric' => 'The total price must be a valid number.',
            'quantity.required' => 'The quantity is required.',
            'quantity.integer' => 'The quantity must be a valid integer.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a valid number.',
            'status.required' => 'The order status is required.',
            'status.in' => 'The selected status is invalid.',
        ];
    }
}
