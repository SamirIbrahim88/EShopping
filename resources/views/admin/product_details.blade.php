@extends('admin.layout.master')
@section('content')
<div class="panel panel-default">
<div class="panel-heading">
    <h3>Products List</h3>
</div>
<div class="panel-body">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Sell Price</th>
                <th>Buy Price</th>
                <th>QTY</th>
                <th>Details</th>
                <th>Category</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            {{--@foreach ($products as $product)--}}
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
                </tr>
            {{--@endforeach--}}
        </tbody>
    </table>

</div>
</div>
@endsection

