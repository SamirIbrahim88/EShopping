@extends('admin.layout.master')
@section('title','Edit Product')

@section('content')
<div class="panel panel-default ">
    <div class="panel-heading">
        <h4> Edit Product</h4>
    </div>
    <div class="panel-body">

        @if (Session()->has('success'))
        <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        {{Session()->get('success')}}
        </div>
        @endif

        <form action="{{route('update.product',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label  class="form-label">Category</label>
                <select name="category" class="form-control" >
                        @foreach ($category as $category)
                            <option value="{{$category->id}}"
                                    @if($product->category_id == $category->id ){
                                        selected
                                    }
                                    @endif
                                name="category_id">{{$category->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
              <label  class="form-label">Name</label>
              <input type="text" value="{{$product->name}}" name="name" class="form-control" >
            </div>
            <div class="form-group">
                <label  class="form-label">Buy Price</label>
                <input type="text" value="{{$product->buy_price}}" name="bprice" class="form-control" >
              </div>
              <div class="form-group">
                <label  class="form-label">Sell Price</label>
                <input type="text" value="{{$product->sell_price}}" name="sprice" class="form-control" >
              </div>
              <div class="form-group">
                <label  class="form-label">QTY</label>
                <input type="text" value="{{$product->qty}}" name="qty" class="form-control" >
              </div>
              <div class="form-group">
                <label  class="form-label">Details</label>
                <input type="text" value="{{$product->details}}" name="details" class="form-control" >
              </div>
              <input type="hidden" name="id" value="{{$product->id}}">
              <div class="form-group">
                <label  class="form-label">Photo</label>
                <img src="/images/products/{{$product->photo}}" width="60" height="60" alt="">
                <input type="file" value="{{$product->photo}}"  name="photo" class="form-control" >
              </div>
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
    </div>
</div>
@endsection
