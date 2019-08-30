@extends('admin.master')
@section('content')
<hr/>
<h3 class="text-center text-success" id="xyz">{{Session::get('message')}}</h3>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>Sl No</th>
            <th>CustomerName</th>
            <th>Order Total</th>
            <th>Order Date</th>
            <th>Order Status</th>
            <th>Payment Type</th>
            <th>Payment Status</th>
            <th>Action</th>

        </tr>
    </thead>
    @php($i=1)
    @foreach($orders as $order)
    <tbody>
        <tr>
         
            <th scope="row">{{$i++}}</th>
            <td>{{$order->first_name.' '.$order->last_name}}</td>
            <td>{{$order->order_total}}</td>
            <td>{{$order->created_at}}</td>
            <td>{{$order->order_status}}</td>
            <td>{{$order->payment_type}}</td>
            <td>{{$order->payment_status}}</td>
            <td>
                <a href="{{route('view-order-detail',['id'=> $order->id])}}" class="btn btn-info btn-xs" title="View order details" >
                    <samp class="glyphicon glyphicon-zoom-in"></samp>
                </a>

                <a href="{{route('view-order-invoice',['id'=> $order->id])}}" class="btn btn-warning btn-xs" title="View order Invoice" >
                    <samp class="glyphicon glyphicon-zoom-out"></samp>
                </a>
                <a href="{{route('download-order-invoice',['id'=> $order->id])}}" class="btn btn-primary btn-xs" title="Download order Invoice" >
                    <samp class="glyphicon glyphicon-download"></samp>
                </a>
                <a href="{{route('edit-category',['id'=> $order->id])}}" class="btn btn-success btn-xs" title="Edit Order">
                    <samp class="glyphicon glyphicon-edit"></samp>
                </a>
                <a href="{{route('delete-category',['id'=> $order->id])}}" class="btn btn-danger btn-xs" title="Delete Order">
                    <samp class="glyphicon glyphicon-trash"></samp>
                </a>
            </td>

        </tr>
    </tbody>
    @endforeach
</table>
@endsection
  
