@extends('layouts.master')

@section('title', 'Edit Wishlist')

@section('content')
    <div class="container">
        <h1>Edit Wishlist</h1>

        <form action="{{ url('admin/update-wishlist/'.$wishlist->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="customer_id">Customer</label>
                <select id="customer_id" name="customer_id" class="form-control">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $wishlist->customer_id == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="product_id">Product</label>
                <select id="product_id" name="product_id" class="form-control">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" {{ $wishlist->product_id == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Wishlist</button>
        </form>

        <a href="{{ url('admin/wishlists') }}" class="btn btn-secondary mt-3">Back to Wishlist</a>
    </div>
@endsection
