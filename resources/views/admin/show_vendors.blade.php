@extends('admin.layout.master')
@section('title','Vendors List')

@section('content')
    <div class="panel panel-default ">
        <div class="panel-heading">
            <h4> Create New Vendor </h4>
        </div>
        <div class="panel-body">
            @if (Session()->has('success'))
                <div class="alert alert-success">
                {{Session()->get('success')}}
                </div>
            @endif
            <form action="{{route('addnew.vendor')}}" method="POST">
                @csrf
                <div class="form-group">
                <label class="form-label">Vendor Name</label>
                <input type="text" name="name" class="form-control" >
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Vendor phone</label>
                    <input type="text" name="phone" class="form-control" >
                    @error('phone')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Vendor Email</label>
                    <input type="text" name="email" class="form-control" >
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Vendor Password</label>
                    <input type="text" name="password" class="form-control" >
                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

    <div class="panel panel-default ">
        <div class="panel-heading">
            <h4>Vendors List</h4>
        </div>
        <div class="panel-body">
            @if (isset($vendors) && $vendors->count() > 0)
            <table id="vendors" class="table table-bordered">

                @if (Session()->has('deleted'))
                <div class="alert alert-danger">
                    {{Session()->get('deleted')}}
                </div>
                @endif

                <thead>
                    <tr>
                        <th>Vendor Name</th>
                        <th>Vendor Phone</th>
                        <th>Vendor Email</th>
                        <th>Vendor Status</th>
                        <th class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vendors as $vendor)
                        <tr>
                            <td>{{$vendor->name}}</td>
                            <td>{{$vendor->phone}}</td>
                            <td>{{$vendor->email}}</td>
                            <td>{{$vendor->status}}</td>
                            <td class="text-center">
                                <a href="{{route('edit.category',$vendor->id)}}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('delete.category',$vendor->id)}}"
                                    class="btn btn-danger btn-sm">Delete</a>
                                <a href="{{route('vendors.products',$vendor->id)}}" class="btn btn-warning btn-sm">Show Products</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-danger">
                <h4> There is no Vendors to diplay</h4>
            </div>
            @endif
{{$vendors->links()}}
        </div>
    </div>
@endsection
