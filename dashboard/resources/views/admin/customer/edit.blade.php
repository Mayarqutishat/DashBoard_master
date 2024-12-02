@extends('layouts.master')

@section('title', 'Customer')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Customer</h4>
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
                                <a href="{{ route('edit-customer', $customer->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('delete-customer', $customer->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')  <!-- Spoofing DELETE method -->
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $customers->links() }} <!-- Pagination links -->
        </div>
    </div>
</div>
@endsection
