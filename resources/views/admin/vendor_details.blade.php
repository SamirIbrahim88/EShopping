@extends('admin.layout.master')
@section('title','Vendor Details ')

@section('content')

    <div class="panel panel-default ">
        <div class="panel-heading">
            <h4>Vendor's Products Details</h4>
        </div>
        <div class="panel-body">
            @if (isset($vendor) && $vendor->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Vendor Name</th>
                        <th>Vendor Phone</th>
                        <th>Vendor Phone code</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{$vendor->name}}</td>
                            <td>{{$vendor->phone}}</td>
                            <td>{{$vendor->name}}</td>
                        </tr>
                </tbody>
            </table>
            @else
            <div class="alert alert-danger">
                <h4> There is no products to this vendor to diplay</h4>
            </div>
            @endif
        </div>
    </div>
    @endsection
