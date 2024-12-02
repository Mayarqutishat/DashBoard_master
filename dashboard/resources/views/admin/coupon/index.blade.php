@extends('layouts.master')

@section('title', 'Coupon')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                View Coupon
                <a href="{{ url('admin/add-coupon') }}" class="btn btn-primary float-end">Add Coupon</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Code</th>
                        <th>Discount</th>
                        <th>Expiry Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coupons as $coupon)
                        <tr>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->discount }}%</td>
                            <td>{{ $coupon->expiry_date }}</td>
                        
                            <td>
                                @if ($coupon->trashed())
                                    <a href="{{ url('admin/restore-coupon/' . $coupon->id) }}" class="btn btn-success btn-sm">Restore</a>
                                @else
                                    <a href="{{ url('admin/edit-coupon/' . $coupon->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('admin/delete-coupon/' . $coupon->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No coupons found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="pagination justify-content-center mt-3">
                {{ $coupons->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
