<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Shipping;
use Session;
use Mail;
use App\Order;
use App\OrderDetail;
use App\Payment;
use Cart;
class CheckoutController extends Controller
{
    public function index(){
        return view('front-end.checkout.checkout-content');
    }
    public function customerSignUp(Request $request){
        $this->validate($request,[
            'email_address'=>'email|unique:customers,email_address'
        ]);
        
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password = bcrypt($request->password);
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->save();
        $customerId=$customer->id;
        Session::put('customerId', $customerId);
        Session::put('customerName',$customer->first_name.''.$customer->last_name);
        $data = $customer->toArray();
        Mail::send('front-end.mails.conformation-mail',$data,function($message) use ($data){
            $message->to($data['email_address']);
            $message->subject('Conformation mail');
        } );
        return redirect('/checkout/shipping');
    }
    public function customerLoginCheck(Request $request){
        $customer = Customer::where('email_address',$request->email_address)->first();
        
        if(password_verify($request->password,$customer->password)){
            Session::put('customerId', $customer->id);
            Session::put('customerName',$customer->first_name.''.$customer->last_name);
            return redirect('/checkout/shipping');
        }else{
            return redirect('/checkout')->with('message','Password is Invalid');
        }
        
    }
    public function customerLogout(){
        Session::forget('customerId');
        Session::forget('customerName');
        return redirect('/');
    }
    public function newCustomerLogin(){
        return view('front-end.customer.customer-login');
    }

    public function shippingForm(){
        $customer = Customer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping',['customer'=>$customer]);
    }
    public function saveShippingInfo(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();
        Session::put('shippingId', $shipping->id);
        return redirect('/checkout/payment');
    }
    public function paymentForm(){
        return view('front-end.checkout.payment');
    }
    public function newOrder(Request $request){
        $paymentType = $request->payment_type;
        
        if($paymentType == 'cashOnDelivery'){
            $order = new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();
            
            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->payment_type = $paymentType;
            $payment->save();
            
            $cartProducts = Cart::content();
            foreach ($cartProducts as $cartProduct){
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->qty;
                $orderDetail->save();
                
            }
            Cart::destroy();
            return redirect('/complete/order');
        }elseif ($paymentType == 'bkash') {
            return 'Under construction bkash payment type. please use cash on delivary';
        }elseif ($paymentType == 'paypal') {
            return 'Under construction paypal payment type. please use cash on delivary';
        }
        
    }
    public function completeOrder(){
        return 'success';
    }
}
