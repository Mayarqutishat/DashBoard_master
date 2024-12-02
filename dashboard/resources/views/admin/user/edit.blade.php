@extends('layouts.master')

@section('title', 'Edit Users')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Users
                <a href="{{ url('admin/users') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/update-user/'.$user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email">Email Id</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Created At</label>
                    <input type="text" class="form-control" value="{{ $user->created_at->format('d/m/Y') }}" disabled>
                </div>

                <div class="mb-3">
                    <label>Role as</label>
                    <div class="form-control">
                        {{ $user->role_as == '1' ? 'Admin' : 'User' }}
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update User Info</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
