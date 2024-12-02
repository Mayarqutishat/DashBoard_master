@extends('layouts.master')

@section('title', 'Wishlist')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Wishlist 
            
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
                    <th>ID</th>
                    <th>Customer ID</th>
                    <th>Product ID</th>
                    <th>Created By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wishlists as $wishlist)
                    <tr>
                        <td>{{ $wishlist->id }}</td>
                        <td>{{ $wishlist->customer_id }}</td>
                        <td>{{ $wishlist->product_id }}</td>
                        <td>{{ $wishlist->created_by }}</td>
                        <td>
                        
                        <a href="{{ url('admin/delete-wishlist/' . $wishlist->id) }}" class="btn btn-danger btn-sm" 
                           onclick="return confirm('Are you sure you want to delete this testimonial?')">Delete</a>
                    </td>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        {{ $wishlists->links() }}
    </div>
</div>

@endsection
