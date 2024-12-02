@extends('layouts.master')

@section('title', 'Orders')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4> viewOrders 
                <a href="{{ url('admin/add-order') }}" class="btn btn-primary btn-sm float-end">Add Order</a>
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer->name ?? 'N/A' }}</td>
                            <td>{{ $order->product->name ?? 'N/A' }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                @if ($order->trashed())
                                    <a href="{{ url('admin/restore-order/' . $order->id) }}" class="btn btn-success btn-sm">Restore</a>
                                @else
                                    <a href="{{ url('admin/edit-order/' . $order->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('admin/delete-order/' . $order->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Orders Available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
