@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('add.property')}}" class="btn btn-inverse-primary">Add Property</a></li>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Property Details</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Property Type</th>
                                    <th>Status Type</th>
                                    <th>Code</th>

                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1

                                @endphp
                                @if(count($properties)>0)
                                @foreach($properties as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->property_name}}</td>
                                    <td> <img class="wd-60 rounded-circle" src="{{(!empty($item->property_thambnail)) ? url($item->property_thambnail) : url('upload/no_image.jpg')}}" alt="profile"></td>

                                    <td>{{$item['type']['type_name']}}</td>
                                    <td>{{$item->property_status}}</td>
                                    <td>{{$item->property_code}}</td>
                                    @if($item->status==1)
                                    <td>
                                        <a href="{{route('atoi.agent',$item->id)}}" class="btn btn-outline-primary">Active</a>
                                    </td>
                                    @else
                                    <td>
                                        <a href="{{route('itoa.agent',$item->id)}}" class="btn btn-outline-danger">Inactive</a>
                                    </td>
                                    @endif

                                    <td>
                                        <a href="{{route('edit.property',$item->id)}}" class="btn btn-outline-primary">Edit</a>
                                        <a href="{{route('delete.property',$item->id)}}" class="btn btn-outline-danger">Delete</a>
                                    </td>


                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7" class="text-center">No Data Found</td>
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