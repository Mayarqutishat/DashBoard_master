@extends('layouts.master')

@section('title', ' Order')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Order</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/update-order/' . $order->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="customer_id">Customer</label>
                    <select id="customer_id" name="customer_id" class="form-control">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="product_id">Product</label>
                    <select id="product_id" name="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $order->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="{{ $order->quantity }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="total_price">Total Price</label>
                    <input type="number" id="total_price" name="total_price" value="{{ $order->total_price }}" class="form-control" step="0.01">
                </div>
                <div class="mb-3">
                    <label for="total_price"> Price</label>
                    <input type="number" id="price" name="price" value="{{ $order->price }}" class="form-control" step="0.01">
                </div>

                <div class="mb-3">
                    <label for="status">Status</label>
                    <input type="text" id="status" name="status" value="{{ $order->status }}" class="form-control">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
