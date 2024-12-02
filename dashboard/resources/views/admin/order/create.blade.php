@extends('layouts.master')

@section('title', 'Order')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Add Order</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('admin/add-order') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="customer_id">Customer</label>
                    <select id="customer_id" name="customer_id" class="form-control">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="product_id">Product</label>
                    <select id="product_id" name="product_id" class="form-control">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="total_price">Total Price</label>
                    <input type="number" id="total_price" name="total_price" class="form-control" step="0.01">
                </div>

                <div class="mb-3">
                    <label for="total_price"> Price</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01">
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <input type="text" id="status" name="status" class="form-control">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
