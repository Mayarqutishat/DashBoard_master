@extends('layouts.master')

@section('title', 'Orders')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Products 
                <a href="{{ url('admin/add-product') }}" class="btn btn-primary btn-sm float-end">Add Product</a>
            </h4>
        </div>
        <div class="card-body">

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

       

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>
                            <a href="{{ url('admin/edit-product/'.$product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ url('admin/delete-product/'.$product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $products->links() }}
    </div>
</div>

@endsection
