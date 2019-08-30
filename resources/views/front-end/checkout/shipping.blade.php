@extends('front-end.master')

@section('body')
<hr/>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="well lead text-center text-success">Hello <b>{{Session::get('customerName')}}</b>. You have to give us product shipping information to complete your valuable order. If your product billing information & shipping information are same then just press on save shipping info button</div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <h3 class="text-center">Shipping Form </h3>
        <hr/>
        <div class="well box box-primary">
            {!! Form::open(['route'=>'new-shipping', 'method'=>'POST']) !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" name="full_name" value="{{ $customer->first_name.' '.$customer->last_name}}" class="form-control" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" value="{{ $customer->email_address }}" name="email_address" class="form-control" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea name="address" class="form-control" placeholder="Enter Address">{{ $customer->address }}</textarea>
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="number" name="phone_number" value="{{ $customer->phone_number }}" class="form-control" placeholder="Enter Phone Number">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="submit" name="btn" class="form-control btn btn-info" value="Save Shipping Info"/>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
