@extends('layouts.master')

@section('title','Edit Product')

@section('content')
<div class="container mt-4">
    <h1>Edit Testimonial</h1>
    <form action="{{ url('admin/update-testimonial/' . $testimonial->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control @error('customer_id') is-invalid @enderror">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $testimonial->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $testimonial->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror" 
                   value="{{ old('rating', $testimonial->rating) }}" min="1" max="5">
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror">{{ old('comment', $testimonial->comment) }}</textarea>
            @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content', $testimonial->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update Testimonial</button>
    </form>
</div>
@endsection
