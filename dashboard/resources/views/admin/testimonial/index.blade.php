@extends('layouts.master')

@section('title', 'testimonial')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View testimonial
            
            </h4>
        </div>
        <div class="card-body">

        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->id }}</td>
                    <td>{{ $testimonial->customer->name }}</td>
                    <td>{{ $testimonial->product->name }}</td>
                    <td>{{ $testimonial->rating }}</td>
                    <td>
                        <a href="{{ url('admin/edit-testimonial/' . $testimonial->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ url('admin/delete-testimonial/' . $testimonial->id) }}" class="btn btn-danger btn-sm" 
                           onclick="return confirm('Are you sure you want to delete this testimonial?')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination Links --}}
    {{ $testimonials->links() }}
</div>
@endsection
