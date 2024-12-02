<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        // Paginate categories to improve performance
        $categories = Category::withTrashed()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $category = new Category();

        // Fill attributes
        $category->fill($data);

        // Handle image upload
        if ($request->hasFile('image')) {
            $category->image = $this->uploadImage($request->file('image'));
        }
        $category->navbar_status = $request->navbar_status ? '1' : '0';
        $category->status = $request->status ? '1' : '0';
        $category->created_by = Auth::id();
        $category->save();

        return redirect('admin/category')->with('message', 'Category added successfully.');
    }

    public function edit($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $category = Category::findOrFail($category_id);
        $data = $request->validated();

        // Update attributes
        $category->fill($data);

        // Handle image update
        if ($request->hasFile('image')) {
            if ($category->image && File::exists('uploads/category/' . $category->image)) {
                File::delete('uploads/category/' . $category->image);
            }
            $category->image = $this->uploadImage($request->file('image'));
        }

        $category->navbar_status = $request->navbar_status ? '1' : '0';
        $category->status = $request->status ? '1' : '0';
        $category->update();

        return redirect('admin/category')->with('message', 'Category updated successfully.');
    }

    public function destroy($category_id)
    {
        $category = Category::findOrFail($category_id);

        

        $category->delete(); // Perform soft delete
        return redirect('admin/category')->with('message', 'Category deleted successfully.');
    }

    public function restore($category_id)
    {
        $category = Category::withTrashed()->findOrFail($category_id);

        $category->restore();
        return redirect('admin/category')->with('message', 'Category restored successfully.');
    }

    private function uploadImage($file)
    {
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/category/', $filename);
        return $filename;
    }
}
