<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CouponFormRequest;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::paginate(10);
        return view('admin.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupon.create');
    }
    public function store(CouponFormRequest $request)
    {
        // Validate and fill the request data
        $data = $request->validated();
        $coupon = new Coupon();
    
        // Fill coupon data
        $coupon->code = $data['code']; // Unique coupon code
        $coupon->discount = $data['discount']; // Discount amount
        $coupon->expiry_date = $data['expiry_date']; // Expiry date
        $coupon->created_at = now(); // Automatically set current timestamp
    
        // Save the coupon
        $coupon->save();
    
        // Redirect after successful creation
        return redirect()->route('admin.coupons.index')->with('message', 'Coupon added successfully.');
    }
    

    public function edit($coupon_id)
    {
        $coupon = Coupon::findOrFail($coupon_id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function update(CouponFormRequest $request, $coupon_id)
    {
        $coupon = Coupon::findOrFail($coupon_id);
        $data = $request->validated();
        $coupon->fill($data);

        $coupon->save();

        return redirect('admin/coupon')->with('message', 'Coupon updated successfully.');
    }

    public function destroy($coupon_id)
    {
        $coupon = Coupon::findOrFail($coupon_id);
        $coupon->delete(); // Perform soft delete
        return redirect('admin/coupon')->with('message', 'Coupon deleted successfully.');
    }
}
