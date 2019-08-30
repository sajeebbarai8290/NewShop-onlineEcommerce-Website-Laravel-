@extends('admin.master')
@section('content')
<hr/>
<h3 class="text-center text-success" ">Order Details For This Order</h3>
<hr/>
<table class="table table-hover table-bordered">
    <tr>
        <th>Order No</th>
        <td>{{$order->id}}</td>
    </tr>
    <tr>
        <th>Order Total</th>
        <td>{{$order->order_total}}</td>
    </tr>
    <tr>
        <th>Order Status</th>
        <td>{{$order->order_status}}</td>
    </tr>
    <tr>
        <th>Order Date</th>
        <td>{{$order->created_at}}</td>
    </tr>
    
</table>
<hr/>
<h3 class="text-center text-success" >Customer Info For This Order</h3>
<hr/>
<table class="table table-hover table-bordered">
    <tr>
        <th>Full Name</th>
        <td>{{$customer->first_name.' '.$customer->last_name}}</td>
    </tr>
    <tr>
        <th>Phone Number</th>
        <td>{{$customer->phone_number}}</td>
    </tr>
    <tr>
        <th>Email Address</th>
        <td>{{$customer->email_address}}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{$customer->address}}</td>
    </tr>
    
</table>
<hr/>
<h3 class="text-center text-success" >Shipping Info For This Order</h3>
<hr/>
<table class="table table-hover table-bordered">
    <tr>
        <th>Full Name</th>
        <td>{{$shipping->full_name}}</td>
    </tr>
    <tr>
        <th>Phone Number</th>
        <td>{{$shipping->phone_number}}</td>
    </tr>
    <tr>
        <th>Email Address</th>
        <td>{{$shipping->email_address}}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{$shipping->address}}</td>
    </tr>
    
</table>
<hr/>
<h3 class="text-center text-success" >Payment Info For This Order</h3>
<hr/>
<table class="table table-hover table-bordered">
    <tr>
        <th>Payment Type</th>
        <td>{{$payment->payment_type}}</td>
    </tr>
    <tr>
        <th>Payment Status</th>
        <td>{{$payment->payment_status}}</td>
    </tr>
    
</table>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>Sl No</th>
            <th>ProductId</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Total Price</th>
        </tr>
    </thead>
    @php($i=1)
    @foreach($orderDetails as $orderDetail)
    <tbody>
        <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$orderDetail->product_id}}</td>
            <td>{{$orderDetail->product_name}}</td>
            <td>Tk. {{$orderDetail->product_price}}</td>
            <td>{{$orderDetail->product_quantity}}</td>
            <td>TK. {{$orderDetail->product_price*$orderDetail->product_quantity}}</td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection
  

