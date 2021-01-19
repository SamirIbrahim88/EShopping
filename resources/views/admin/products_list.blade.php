@extends('admin.layout.master')
@section('content')
<div class="panel panel-default">
<div class="panel-heading">
    <h3>Products List</h3>
</div>
<div class="panel-body">

    @if (isset($products) && $products->count() > 0)
    <table class="table table-bordered" id="products">
        @if (Session()->has('deleted'))
        <div class="alert alert-danger">
            {{Session()->get('deleted')}}
        </div>
        @endif

        <thead>
            <tr>
                <th>Name</th>
                <th>Sell Price</th>
                <th>Buy Price</th>
                <th>QTY</th>
                <th>Details</th>
                <th>Category</th>
                <th>Photo</th>
                <th class="text-center">Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->sell_price}}</td>
                    <td>{{$product->buy_price}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->details}}</td>
                    <td>{{$product->categories->name}}</td>
                    <td>
                        @if ($product->photo == NULL)
                            {{'NO IMAGE'}}
                            @else
                                <img width="60" height="60" src="/images/products/{{$product->photo}}" alt="">
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{route('edit.product',$product->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{route('delete.product',$product->id)}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
            <tfoot>
                <tr>
                    <th>Max Product Price : {{$max}} L.E</th>
                    <th>Min Product Price : {{$min}} L.E</th>
                </tr>
            </tfoot>
        </tbody>
    </table>
    @else
    <div class="alert alert-danger">
        <h3> There is no Inserted Products!!!</h3>
    </div>
    @endif
{{$products->links()}}
</div>
</div>
@endsection

