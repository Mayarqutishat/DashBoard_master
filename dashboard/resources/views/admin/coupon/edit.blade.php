@extends('layouts.master')

@section('title','Category')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Coupon</h4>
        </div>
        <div class="card-body">
        @if($errors->any())
        <div class="alret alert-danger">
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
    </div>
@endif

    <form action="{{ url('admin/update-coupon/' . $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="code">Coupon Code</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ $coupon->code }}" required>
        </div>

        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="number" name="discount" id="discount" class="form-control" value="{{ $coupon->discount }}" required>
        </div>

        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="{{ $coupon->expiry_date }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Coupon</button>
    </form>
</div>
@endsection
