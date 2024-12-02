<?php


namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    // Display a listing of the testimonials
    public function index()
    {
        // Paginate the testimonials
        $testimonials = Testimonial::paginate(10);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    // Show the form for creating a new testimonial
    public function create()
    {
        // Fetch customers and products to populate the form
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.testimonial.create', compact('customers', 'products'));
    }

    // Store a newly created testimonial in storage
    public function store(Request $request)
    {
        // Validate incoming request
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        // Store the ID of the currently authenticated user as the creator
        $data['created_by'] = Auth::id();

        // Create the testimonial
        Testimonial::create($data);

        return redirect('admin/testimonial')->with('message', 'Testimonial added successfully.');
    }

    // Show the form for editing the specified testimonial
    public function edit($id)
    {
        // Find the testimonial and pass it to the view
        $testimonial = Testimonial::findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();
        return view('admin.testimonial.edit', compact('testimonial', 'customers', 'products'));
    }

    // Update the specified testimonial in storage
    public function update(Request $request, $id)
    {
        // Find the testimonial and validate the data
        $testimonial = Testimonial::findOrFail($id);

        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'content' => 'nullable|string',
        ]);

        // Update the testimonial with validated data
        $testimonial->update($data);

        return redirect('admin/testimonial')->with('message', 'Testimonial updated successfully.');
    }

    // Remove the specified testimonial from storage
    public function destroy($id)
    {
        // Find the testimonial and delete it
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect('admin/testimonial')->with('message', 'Testimonial deleted successfully.');
    }
}
