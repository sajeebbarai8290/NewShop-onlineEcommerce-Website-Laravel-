@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        <hr/>
        <div class="well">
            {!!Form::open(['route'=>'new-manufacturer','method'=>'POST','class'=>'form-horizontal'])!!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Manufacturer Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="manufacturer_name">
                    <span class="text-danger">{{$errors->has('manufacturer_name')?$errors->first('manufacturer_name'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Manufacturer Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="manufacturer_description" rows="8"></textarea>
                    <span class="text-danger">{{$errors->has('manufacturer_description')?$errors->first('manufacturer_description'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Publication Status</label>
                <div class="col-sm-10 radio">
                    <label><input type="radio" checked name="publication_status" value="1"/>Published</label>
                    <label><input type="radio"  name="publication_status" value="0"/>Unpublished</label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <input type="submit" name="btn" class="btn btn-success btn-block " value="Save Manufacturer Info"/>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
    
</div>

@endsection



