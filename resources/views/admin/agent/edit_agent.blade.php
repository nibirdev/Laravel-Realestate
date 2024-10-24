@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('add.agent')}}" class="btn btn-inverse-primary">Add Agent</a></li>

        </ol>
    </nav>
    <form action="{{route('update.agent',$agent->id)}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="col-md-12 col-xl-12 middle-wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Agent Grid</h6>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Agent Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$agent->name}}">
                                    </div>
                                </div><!-- Col -->


                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$agent->email}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$agent->phone}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{$agent->address}}">
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary submit my-3">Update Agent Details</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

</div>


@endsection