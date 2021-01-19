@extends('admin.layout.master')
@section('title','Vendors Products ')

@section('content')

    <div class="panel panel-default ">
        <div class="panel-heading">
            <h4>Vendor's Products List</h4>
        </div>
        <div class="panel-body">
            @if (isset($products) && $products->count() > 0)
            <table class="table table-bordered">

                @if (Session()->has('deleted'))
                <div class="alert alert-danger">
                    {{Session()->get('deleted')}}
                </div>
                @endif

                <thead>
                    <tr>
                        <th>{{$vendor->name}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="alert alert-danger">
                <h4> There is no products to this vendor to diplay</h4>
            </div>
            @endif


            <!--

            -->

        </div>
    </div>

    <!--Add Product to a vendor-->
    <div class="panel panel-default">
        @if (Session()->has('success'))
        <div class="alert alert-success">
            {{Session()->get('success')}}
        </div>
        @endif
        <a href="#demo" class="btn btn-info" data-toggle="collapse">Add product (s)</a>
        <div id="demo" class="collapse">
            <form action="{{route('save.vendor.products')}}" method="POST">
                @csrf
                <input type="text" name="vendor_id" value="{{$vendor->id}}"><br><br>
                <select name="all_products[]" class="form-control" multiple style="width: 250px;">
                    <option>Select Product (s)</option>
                    <option>======================================</option>
                    @foreach ($all_products as $all)
                        <option value="{{$all->id}}">{{$all->name}}</option>
                    @endforeach
                </select><br>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
      </div>
@endsection
