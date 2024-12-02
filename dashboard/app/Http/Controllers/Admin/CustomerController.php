<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CustomerFormRequest;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('admin.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(CustomerFormRequest $request)
    {
        // Validate and fill the request data
        $data = $request->validated();
        $customer = new Customer();

        // Fill customer data
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->phone = $data['phone'];
        $customer->address = $data['address'];
        $customer->age = $data['age'];
        $customer->gender = $data['gender'];
        $customer->created_at = now();

        // Encrypt the password before saving
        $customer->password = Hash::make($data['password']); // Ensure password is encrypted

        // Save the customer
        $customer->save();

        // Redirect after successful creation
        return redirect()->route('admin.customer.index')->with('message', 'Customer added successfully.');
    }

    public function edit($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(CustomerFormRequest $request, $customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $data = $request->validated();

        // Update customer data (except password)
        $customer->fill($data);

        // Check if a new password is provided, and hash it if true
        if ($request->password) {
            $customer->password = Hash::make($request->password); // Hash new password
        }

        // Save the updated customer data
        $customer->save();

        // Redirect after successful update
        return redirect()->route('admin.customer.index')->with('message', 'Customer updated successfully.');
    }

    public function destroy($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $customer->delete(); // Soft delete the customer
        return redirect()->route('admin.customer.index')->with('message', 'Customer deleted successfully.');
    }
}

