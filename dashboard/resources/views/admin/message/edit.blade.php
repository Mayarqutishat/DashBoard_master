@extends('layouts.master')

@section('title', 'message')

@section('content')

    <div class="container">
        <h1>Edit Message</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.message.update', $message->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $message->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $message->email) }}" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" rows="4" required>{{ old('message', $message->message) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Message</button>
            <a href="{{ route('admin.message.index') }}" class="btn btn-secondary mt-3">Cancel</a>
        </form>
    </div>
@endsection
