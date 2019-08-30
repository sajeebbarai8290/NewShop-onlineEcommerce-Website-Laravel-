@extends('admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
            <hr/>
            <div class="well">
                {!!Form::open(['route'=>'Update-slider','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Slider Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="{{$slider->title}}">
                        <input type="hidden" class="form-control" name="id" value="{{$slider->id}}">
                        <span class="text-danger">{{$errors->has('title')?$errors->first('title'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Slider Image</label>
                    <div class="col-sm-10">
                        <input type="file"  name="slider_image" accept="image/*">
                        <img src="{{asset($slider->slider_image)}}" height="200" width="200">
                        <span class="text-danger">{{$errors->has('slider_image')?$errors->first('slider_image'):''}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputpassword3" class="col-sm-2 control-label">Publication Status</label>
                    <div class="col-sm-10 radio">
                        <label><input type="radio" checked name="publication_status" value="1" {{$slider->publication_status == 1 ? 'checked' : ''}}/>Published</label>
                        <label><input type="radio"  name="publication_status" value="0" {{$slider->publication_status == 0 ? 'checked' : ''}}/>Unpublished</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-2 col-sm-10">
                        <button type="submit" name="btn" class="btn btn-success btn-block">Update Slider Info</button>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>

    </div>
@endsection