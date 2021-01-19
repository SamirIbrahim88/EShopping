@extends('admin.layout.master')
@section('title','Edit Category ')

@section('content')
    <div class="panel panel-default ">
        <div class="panel-heading">
            <h4> Edit Category</h4>
        </div>
        <div class="panel-body">
            @if (Session()->has('success'))
                <div class="alert alert-success">
                {{Session()->get('success')}}
                </div>
            @endif

            <form action="{{route('update.category',$category->id)}}" method="POST">
                @csrf
                <div class="form-group">
                  <label class="form-label">Category Name</label>
                  <input type="text" value="{{$category->name}}" name="name" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>
    </div>
@endsection
