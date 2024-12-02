<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(ProductFormRequest $request)
    {
        // Validate and fill the request data
        $data = $request->validated();
        $product = new Product();

        // Fill product data
        $product->customer_id = Auth::id(); // Set the current logged-in user as the customer
        $product->name = $data['name'];
        $product->category_id = $data['category_id']; // Linking to Category
        $product->price = $data['price'];
        $product->stock_quantity = $data['stock_quantity']; // Ensure correct field name is used
        $product->description = $data['description'];
        $product->created_by = Auth::id(); // Current logged-in user
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/products');
            $product->image_url = Storage::url($imagePath); // Store the image URL
        }

        // Save the product
        $product->save();

        return redirect('admin/product')->with('message', 'Product added successfully.');
    }

    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(ProductFormRequest $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $data = $request->validated();

        // Update product data
        $product->fill($data);
        
        // Handle image update if present
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image_url) {
                Storage::delete(str_replace('storage', 'public', $product->image_url));
            }

            $imagePath = $request->file('image')->store('public/products');
            $product->image_url = Storage::url($imagePath);
        }

        $product->save();

        return redirect('admin/product')->with('message', 'Product updated successfully.');
    }

    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete(); // Perform soft delete

        return redirect('admin/product')->with('message', 'Product deleted successfully.');
    }

    public function restore($product_id)
    {
        $product = Product::withTrashed()->findOrFail($product_id);
        $product->restore(); // Restore soft-deleted product

        return redirect('admin/product')->with('message', 'Product restored successfully.');
    }
    private function uploadImage($file)
    {
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/product/', $filename);
        return $filename;
    }

}

