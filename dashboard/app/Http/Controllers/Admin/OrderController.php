<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\OrderFormRequest;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch orders, including soft-deleted ones
        $orders = Order::withTrashed()->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        // Fetch customers and products to populate dropdowns in the create view
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.order.create', compact('customers', 'products'));
    }

    public function store(OrderFormRequest $request)
    {
        // Validate and fill the request data
        $data = $request->validated();
        $order = new Order();
        
        // Fill order data
        $order->customer_id = $data['customer_id']; // Linking to Customer
        $order->product_id = $data['product_id']; // Linking to Product
        $order->total_price = $data['total_price'];
        $order->quantity = $data['quantity'];
        $order->price = $data['price'];
        $order->status = $request->status ? '1' : '0'; // Handle status
        $order->created_by = Auth::id(); // Current logged-in user
        
        // Save the order
        $order->save();

        // Redirect after successful creation
        return redirect()->route('admin.order.index')->with('message', 'Order added successfully.');
    }

    public function edit($order_id)
    {
        // Fetch order, customers, and products for the edit view
        $order = Order::findOrFail($order_id);
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.order.edit', compact('order', 'customers', 'products'));
    }

    public function update(OrderFormRequest $request, $order_id)
    {
        // Fetch the order by ID
        $order = Order::findOrFail($order_id);

        // Validate and update the data
        $data = $request->validated();
        $order->fill($data);

        // Handle status and update the order
        $order->status = $request->status ? '1' : '0';
        $order->created_by = Auth::id();
        $order->save();

        // Redirect after successful update
        return redirect()->route('admin.order.index')->with('message', 'Order updated successfully.');
    }

    public function destroy($order_id)
    {
        // Find the order and delete (soft delete)
        $order = Order::findOrFail($order_id);
        $order->delete(); // Soft delete
        return redirect()->route('admin.order.index')->with('message', 'Order deleted successfully.');
    }

    public function restore($order_id)
    {
        // Restore a soft-deleted order
        $order = Order::withTrashed()->findOrFail($order_id);
        $order->restore();
        return redirect()->route('admin.order.index')->with('message', 'Order restored successfully.');
    }
}
