@extends('agent.agent_master')

@section('agent')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('agent.add.property')}}" class="btn btn-inverse-primary">Add Property</a></li>

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
                                    <th>package_name</th>
                                    <th>Image</th>
                                    <th>package_amount</th>
                                    <th>package_credits</th>
                                    <th>Total</th>


                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1

                                @endphp
                                @if(count($package)>0)
                                @foreach($package as $item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$item->package_name}}</td>
                                    <td> <img class="wd-60 rounded-circle" src="{{(!empty($item->user->property_thambnail)) ? url($item->user->property_thambnail) : url('upload/no_image.jpg')}}" alt="profile"></td>

                                    <td>{{$item->package_credits}}</td>
                                    <td>{{$item->package_amount }}</td>
                                    <td>{{$item->created_at}}</td>


                                    <td>

                                        <a href="{{route('download.history.package',$item->id)}}" class="btn btn-outline-danger">Download</a>
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