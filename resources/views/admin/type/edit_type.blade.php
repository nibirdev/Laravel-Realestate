@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('all.type')}}" class="btn btn-inverse-primary">Add Property</a></li>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Edit Property</h6>

                        <form class="forms-sample" method="POST" action="{{route('edit.update',$editid->id)}}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Type Name</label>
                                <input type="text" class="form-control @error('Type_Name') is-invalid @enderror" id="old_password" name="Type_Name" autocomplete="off" value="{{$editid->type_name}}">

                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Type Icon</label>
                                <input type="text" class="form-control @error('type_icon') is-invalid @enderror" id="type_icon" name="type_icon" autocomplete="off" value="{{$editid->type_icon}}">

                            </div>




                            <button type="submit" class="btn btn-primary me-2">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection