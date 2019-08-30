@extends('admin.master')
@section('content')
<hr/>
<h3 class="text-center text-success" id="xyz">{{Session::get('message')}}</h3>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>Sl No</th>
            <th>Product Name</th>
            <th>category Name</th>
            <th>Manufacturer Name</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Publication Status</th>
            <th>Action</th>

        </tr>
    </thead>
    @php($i=1)
    @foreach($products as $product)
    <tbody>
        <tr>
         
            <th scope="row">{{$i++}}</th>
            <th scope="row">{{$product->product_name}}</th>
            <td>{{$product->category_name}}</td>
            <td>{{$product->manufacturer_name}}</td>
            <td><img src="{{asset($product->product_image)}}" alt="" height="200" width="200"></td>
            <td>TK.{{$product->product_price}}</td>
            <td>{{$product->product_quantity}}</td>
            <td>{{$product->publication_status == 1 ? 'Published':'Unpublished'}}</td>
            <td>
                @if($product->publication_status == 1)
                    <a href="" class="btn btn-info btn-xs" onclick="return confirm('Are you sure to Unpublished this');">
                        <samp class="glyphicon glyphicon-arrow-up"></samp>
                    </a>
                @else
                    <a href="" class="btn btn-warning btn-xs" onclick="return confirm('Are you sure to delete this');">
                        <samp class="glyphicon glyphicon-arrow-down"></samp>
                    </a>
                @endif
                <br/>
                <a href="" class="btn btn-success btn-xs">
                    <samp class="glyphicon glyphicon-zoom-in"></samp>
                </a>
                <br/>
                <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-success btn-xs">
                    <samp class="glyphicon glyphicon-edit"></samp>
                </a>
                <br/>
                <a href="" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this');">
                    <samp class="glyphicon glyphicon-trash"></samp>
                </a>
            </td>

        </tr>
    </tbody>
    @endforeach
</table>
@endsection
  


