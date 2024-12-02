<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AdminFormRequest;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::paginate(10);
        return view('admin.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(AdminFormRequest $request)
    {
        $data = $request->validated();
        $admin = new Admin();

        // Fill attributes
        $admin->fill($data);
        $admin->password = bcrypt($request->password);
        $admin->created_at = now();
        $admin->save();

        return redirect('admin/admin')->with('message', 'Admin added successfully.');
    }

    public function edit($admin_id)
    {
        $admin = Admin::findOrFail($admin_id);
        return view('admin.admin.edit', compact('admin'));
    }

    public function update(AdminFormRequest $request, $admin_id)
    {
        $admin = Admin::findOrFail($admin_id);
        $data = $request->validated();
        $admin->fill($data);

        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect('admin/admin')->with('message', 'Admin updated successfully.');
    }

    public function destroy($admin_id)
    {
        $admin = Admin::findOrFail($admin_id);
        $admin->delete(); // Perform soft delete
        return redirect('admin/admin')->with('message', 'Admin deleted successfully.');
    }
}

