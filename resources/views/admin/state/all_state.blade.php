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
                    <h6 class="card-title">All Property</h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>State Name</th>
                                    <th>State Image</th>
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
                                    <td>{{$item->state_name}}</td>
                                    <td> <img class="wd-60 rounded-circle" id="showImage" src="{{ (!empty($item->state_image)) ? 
                            url('upload/admin_images/state/'.$item->state_image) : url('upload/no_image.jpg')}}" alt="profile">
                                    </td>
                                    <td>
                                        <a href="{{route('state.edit',$item->id)}}" class="btn btn-outline-primary">Edit</a>
                                        <a href="{{route('state.delete',$item->id)}}" class="btn btn-outline-danger">Delete</a>
                                    </td>


                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" class="text-center">No Data Found</td>
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