@extends('admin.master')
@section('content')
    <hr/>
    <h3 class="text-center text-success" id="xyz">{{Session::get('message')}}</h3>
    <hr/>
    <table class="table table-hover table-bordered">
        <thead>
        <tr class="bg-primary">
            <th>Sl No</th>
            <th>Title</th>
            <th>Slider Image</th>
            <th>Publication Status</th>
            <th>Action</th>

        </tr>
        </thead>
        @php($i=1)
        @foreach($sliders as $slider)
            <tbody>
            <tr>

                <th scope="row">{{$i++}}</th>
                <th scope="row">{{$slider->title}}</th>
                <td><img src="{{asset($slider->slider_image)}}" alt="" height="200" width="250"></td>
                <td>{{$slider->publication_status == 1 ? 'Published':'Unpublished'}}</td>
                <td>
                    @if($slider->publication_status == 1)
                        <a href="{{route('unpublished-slider',['id'=>$slider->id])}}" class="btn btn-info btn-xs" onclick="return confirm('Are you sure to Unpublished this');">
                            <samp class="glyphicon glyphicon-arrow-up"></samp>
                        </a>
                    @else
                        <a href="{{route('published-slider',['id'=>$slider->id])}}" class="btn btn-warning btn-xs" onclick="return confirm('Are you sure to published this');">
                            <samp class="glyphicon glyphicon-arrow-down"></samp>
                        </a>
                    @endif
                    <br/>
                    <a href="{{route('edit-slider',['id'=>$slider->id])}}" class="btn btn-success btn-xs">
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



