@extends('layouts.master')

@section('title','Category')

@section('content')

<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
        @if($errors->any())
        <div class="alret alert-danger">
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
    </div>
@endif

  <form action="{{ url('admin/update-category/'.$category->id) }}" method="post" enctype="multipart/form-data">
     @csrf
    @method('PUT')


 <div class="mb-3">
    <label for="name">Category Name</label>
   <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug" value="{{ $category->slug }}"  class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="mySummernote"  rows="5" class="form-control">{{ $category->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                
               

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">   
                        <label for="navbar_status">Navbar Status</label>
                        <input type="checkbox"  name="navbar_status"{{$category->navbar_status =='1'?'checked':'' }}/>
                    </div>
                    <div class="col-md-3 mb-3">   
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" {{$category->status =='1'?'checked':'' }}/>
                    </div>
                   <div class="col-md-6">
                   <button type="submit" class="btn btn-primary">Update Category</button>
                   </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
