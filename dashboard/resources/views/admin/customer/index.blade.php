@extends('layouts.master')

@section('title', 'Customer')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                View Customer
             
            </h4>
        </div>
        <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->age }}</td>
                    <td>{{ $customer->gender }}</td>
                    <td>
                                @if ($customer->trashed())
                                    <a href="{{ url('admin/restore-customer/' . $customer->id) }}" class="btn btn-success btn-sm">Restore</a>
                                @else
                                    <a href="{{ url('admin/edit-customer/' . $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('admin/delete-customer/' . $customer->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                @endif
                            </td>
                          
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $customers->links() }} <!-- Pagination links -->
@endsection