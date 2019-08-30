<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
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
</body>
</html>

