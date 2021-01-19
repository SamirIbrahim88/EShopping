@extends('admin.layout.master')
@section('title','Create Product')

@section('content')
<div class="panel panel-default ">
    <div class="panel-heading">
        <h4> Create New Product</h4>
    </div>
    <div class="panel-body">
            @if (Session()->has('success'))
            <div class="alert alert-success">
            {{Session()->get('success')}}
            </div>
            @endif
        <form action="{{route('addnew.product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label  class="form-label">Category</label>
                <select name="category" class="form-control" id="">
                <option>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" name="category_id">{{$category->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
              <label  class="form-label">Name</label>
              <input type="text" name="name" class="form-control" value="{{old('name')}}">
              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror
            </div>
            <div class="form-group">
                <label  class="form-label">Buy Price</label>
                <input type="text" name="bprice" class="form-control" value="{{old('bprice')}}" >
                @error('bprice')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label  class="form-label">Sell Price</label>
                <input type="text" name="sprice" class="form-control" value="{{old('sprice')}}">
                @error('sprice')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label  class="form-label">QTY</label>
                <input type="text" name="qty" class="form-control" value="{{old('qty')}}">
                @error('qty')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label  class="form-label">Details</label>
                <input type="text" name="details" class="form-control" value="{{old('details')}}">
              </div>
              <div class="form-group">
                <label  class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control" >
              </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
    </div>
</div>
@endsection
