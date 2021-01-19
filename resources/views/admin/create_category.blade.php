@extends('admin.layout.master')
@section('title','Create Category ')

@section('content')
    <div class="panel panel-default ">
        <div class="panel-heading">
            <h4> Create New Category </h4>
        </div>
        <div class="panel-body">
            @if (Session()->has('success'))
                <div class="alert alert-success">
                {{Session()->get('success')}}
                </div>
            @endif
            <form action="{{route('addnew.category')}}" method="POST">
                @csrf
                <div class="form-group">
                <label class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" >
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

    <div class="panel panel-default ">
        <div class="panel-heading">
            <h4>Categories List</h4>
        </div>
        <div class="panel-body">
            @if (isset($categories) && $categories->count() > 0)
            <table id="categories" class="table table-bordered">

                @if (Session()->has('deleted'))
                <div class="alert alert-danger">
                    {{Session()->get('deleted')}}
                </div>
                @endif

                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td class="text-center">
                                <a href="{{route('edit.category',$category->id)}}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('delete.category',$category->id)}}"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{route('show.category',$category->id)}}" class="btn btn-warning btn-sm">Show Products</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-danger">
                <h4> There is no Category to diplay</h4>
            </div>
            @endif
            {{$categories->links()}}
        </div>
    </div>
@endsection
