@extends('admin.master')
@section('content')
<hr/>
<h3 class="text-center text-success" id="xyz">{{Session::get('message')}}</h3>
<hr/>
<table class="table table-hover table-bordered">
    <thead>
        <tr class="bg-primary">
            <th>Sl No</th>
            <th>ManufacturerName</th>
            <th>ManufacturerDescription</th>
            <th>PublicationStatus</th>
            <th>Action</th>

        </tr>
    </thead>
    @php($i=1)
    @foreach($manufacturers as $manufacturer)
    <tbody>
        <tr>
         
            <th scope="row">{{$i++}}</th>
            <td>{{$manufacturer->manufacturer_name}}</td>
            <td>{{$manufacturer->manufacturer_description}}</td>
            <td>{{$manufacturer->publication_status == 1 ? 'Published':'Unpublished'}}</td>
            <td>
                @if($manufacturer->publication_status == 1)
                    <a href="{{route('unpublished-manufacturer',['id'=> $manufacturer->id])}}" class="btn btn-info btn-xs" onclick="return confirm('Are you sure to Unpublished this');">
                        <samp class="glyphicon glyphicon-arrow-up"></samp>
                    </a>
                @else
                    <a href="{{route('published-manufacturer',['id'=> $manufacturer->id])}}" class="btn btn-warning btn-xs" onclick="return confirm('Are you sure to delete this');">
                        <samp class="glyphicon glyphicon-arrow-down"></samp>
                    </a>
                @endif
                <a href="{{route('edit-manufacturer',['id'=> $manufacturer->id])}}" class="btn btn-success btn-xs">
                    <samp class="glyphicon glyphicon-edit"></samp>
                </a>
                <a href="{{route('delete-manufacturer',['id'=> $manufacturer->id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this');">
                    <samp class="glyphicon glyphicon-trash"></samp>
                </a>
            </td>

        </tr>
    </tbody>
    @endforeach
</table>
@endsection
  


