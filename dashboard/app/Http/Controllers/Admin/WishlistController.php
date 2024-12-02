<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WishlistFormRequest;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::paginate(10);
        return view('admin.wishlist.index', compact('wishlists'));
    }

    public function create()
    {
        return view('admin.wishlist.create');
    }

    public function store(WishlistFormRequest $request)
    {
        // Get validated data
        $data = $request->validated();

        // Create a new wishlist entry
        $wishlist = new Wishlist();
        $wishlist->customer_id = $data['customer_id'];
        $wishlist->product_id = $data['product_id'];
        $wishlist->created_by = Auth::id(); // The user who created the wishlist
        $wishlist->save();

        // Redirect back with a success message
        return redirect('admin/wishlist')->with('message', 'Wishlist added successfully.');
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return redirect('admin/wishlist')->with('message', 'Wishlist removed successfully.');
    }
}
