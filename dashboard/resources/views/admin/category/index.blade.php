@extends('layouts.master')

@section('title', 'Category')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Categories 
                <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
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
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <img src="{{ asset('uploads/category/' . $category->image) }}" width="50px" height="50px" alt="Category Image">
                            </td>
                            <td>{{ $category->status == '1' ? 'Hidden' : 'Shown' }}</td>
                            <td>
                                @if ($category->trashed())
                                    <a href="{{ url('admin/restore-category/' . $category->id) }}" class="btn btn-success btn-sm">Restore</a>
                                @else
                                    <a href="{{ url('admin/edit-category/' . $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('admin/delete-category/' . $category->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Categories Available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div> <!-- Missing closing div fixed -->

@endsection
