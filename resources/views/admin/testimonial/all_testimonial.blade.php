@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('add.type')}}" class="btn btn-inverse-primary">Add Property</a></li>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Testimonial</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Message</th>
                                    <th>Position</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1

                                @endphp
                                @if(count($types)>0)
                                @foreach($types as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->tem_name}}</td>
                                    <td> <img class="wd-60 rounded-circle" id="showImage" src="{{ (!empty($item->tem_image)) ? 
                            url($item->tem_image) : url('upload/no_image.jpg')}}" alt="profile">
                                    </td>
                                    <td>{{$item->tem_message}}</td>
                                    <td>{{$item->tem_position}}</td>
                                    <td>
                                        <a href="{{route('testimonial.edit',$item->id)}}" class="btn btn-outline-primary">Edit</a>
                                        <a href="{{route('testimonial.delete',$item->id)}}" class="btn btn-outline-danger">Delete</a>
                                    </td>


                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-center">No Data Found</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection