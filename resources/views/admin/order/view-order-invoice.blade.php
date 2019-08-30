@extends('admin.master')
@section('content')
<hr/>
<div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: 123<br>
                                Created: January 1, 2015<br>
                                Due: February 1, 2015
                            </td>
                            
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <h3>Shipping Info</h3>
                                <p>{{$shipping->full_name}}</p>
                                <p>{{$shipping->address}}</p>
                                <p>{{$shipping->phone_number}}</p>
                                <p>{{$shipping->email_address}}</p>
                            </td>
                            
                            <td>
                                <h3>Billing Info</h3>
                                <p>{{$customer->first_name.' '.$customer->last_name}}</p>
                                <p>{{$customer->address}}</p>
                                <p>{{$customer->phone_number}}</p>
                                <p>{{$customer->email_address}}</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Invoice
                </td>
                
                <td>
                    0000{{$order->id}}
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Date
                </td>
                
                <td>
                    {{$order->created_at}}
                </td>
            </tr>
            <tr class="details">
                <td>
                    Amount Due
                </td>
                
                <td>
                    {{$order->order_total}}
                </td>
            </tr>
            
           
        </table>
    <table class="table-borderless">
        <tr>
            <th>Item</th>
            <th></th>
            <th>rate</th>
            <th>qty</th>
            <th>Total Price</th>
        </tr>
        @php($sum=0)
        @foreach($orderDetails as $orderDetail)
        <tr>
            <td>{{$orderDetail->product_name}}</td>
            <td></td>
            <td>{{$orderDetail->product_price}}</td>
            <td>{{$orderDetail->product_quantity}}</td>
            <td>{{$total=$orderDetail->product_price*$orderDetail->product_quantity}}</td>
        </tr>
        @php($sum=$sum+$total)
        @endforeach
        <tr class="total">
                <td></td>
                
                <td>
                   Total: {{$sum}}
                </td>
            </tr>
    </table>
    </div>
@endsection
  

