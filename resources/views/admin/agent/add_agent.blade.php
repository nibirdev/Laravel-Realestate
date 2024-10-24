@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('all.property')}}" class="btn btn-inverse-primary">Add Property</a></li>

        </ol>
    </nav>
    <form action="{{route('store.agent')}}" method="POST">
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
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div><!-- Col -->


                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary submit my-3">Add Agent</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>

</div>


@endsection