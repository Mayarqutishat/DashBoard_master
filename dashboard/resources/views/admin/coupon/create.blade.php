@extends('layouts.master')

@section('title', 'Category')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Add Coupon</h4>
        </div>
        <div class="card-body">
        @if($errors->any())
        <div class="alret alert-danger">
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
    </div>
@endif

    <form action="{{ url('add-coupon') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Coupon Code</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required>
        </div>

        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="number" name="discount" id="discount" class="form-control" value="{{ old('discount') }}" required>
        </div>

        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="{{ old('expiry_date') }}" required>
        </div>
        <div class="col-md-6">
    <button type="submit" class="btn btn-primary btn-block">Add Coupon</button>
</div>

    </form>
    </div>
    </div>
</div>
@endsection
