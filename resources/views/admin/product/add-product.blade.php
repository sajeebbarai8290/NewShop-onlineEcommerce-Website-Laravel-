@extends('admin.master')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        <hr/>
        <div class="well">
            {!!Form::open(['route'=>'save-product','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="product_name">
                    <span class="text-danger">{{$errors->has('product_name')?$errors->first('product_name'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Category Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="category_id">
                        <option>select Category Name</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Manufacturer Name</label>
                <div class="col-sm-10">
                    <select class="form-control" name="manufacturer_id">
                        <option>select Manufacturer Name</option>
                        @foreach($manufacturers as $manufacturer)
                        <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturer_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Price</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="product_price">
                    <span class="text-danger">{{$errors->has('product_price')?$errors->first('product_price'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Quantity</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="product_quantity">
                    <span class="text-danger">{{$errors->has('product_quantity')?$errors->first('product_quantity'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Product Short Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="productShortDescription" rows="4"></textarea>
                    <span class="text-danger">{{$errors->has('productShortDescription')?$errors->first('productShortDescription'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputpassword3" class="col-sm-2 control-label">Product Long Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="editor" name="productLongDescription" rows="8"></textarea>
                    <span class="text-danger">{{$errors->has('productLongDescription')?$errors->first('productLongDescription'):''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Product Image</label>
                <div class="col-sm-10">
                    <input type="file"  name="product_image" accept="image/*">
                    <span class="text-danger">{{$errors->has('product_image')?$errors->first('product_image'):''}}</span>
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
                <div class="col-sm-offset-2 col-sm-2 col-sm-10">
                    <button type="submit" name="btn" class="btn btn-success btn-block">Save Product Info</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
    
</div>

@endsection

