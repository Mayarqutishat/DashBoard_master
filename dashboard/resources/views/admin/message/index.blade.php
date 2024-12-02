@extends('layouts.master')

@section('title', 'Contact_us')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>
                View Contact_us
           
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
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ Str::limit($message->message, 50) }}</td>
                            <td>
                                @if ($message->trashed())
                                    <a href="{{ url('admin/restore-message/' . $message->id) }}" class="btn btn-success btn-sm">Restore</a>
                                @else
                                    <a href="{{ url('admin/edit-message/' . $message->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('admin/delete-message/' . $message->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            {{ $messages->links() }}
        </div>
    </div>
</div>
@endsection
