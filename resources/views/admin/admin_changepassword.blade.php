@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded p-2">
                <div class="card-body ">
                    <div class="d-flex align-items-center justify-content-between mb-2 ">

                        <div>
                            <img class="wd-60 rounded-circle" src="{{(!empty($profiledata->photo)) ? url('upload/admin_images/'.$profiledata->photo) : url('upload/no_image.jpg')}}" alt="profile">
                            <span class="h4 ms-3 text-white">{{$profiledata->username}}</span>
                        </div>

                    </div>

                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Name</label>
                    <p class="text-muted">{{$profiledata->name}}</p>
                </div>
                <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone</label>
                    <p class="text-muted">{{$profiledata->phone}}</p>
                </div>
                <div class="mt-3">
                    <label class="tx-11 fw-bolder mb-0 text-uppercase">Email</label>
                    <p class="text-muted">{{$profiledata->email}}</p>
                </div>
                <div class="mt-3">
                    <label class="tx-11 fw-bolder pb-2 text-uppercase">Address</label>
                    <p class="text-muted">{{$profiledata->address}}</p>
                </div>

            </div>
        </div>

        <!-- //form -->

        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Password Panel</h6>

                    <form class="forms-sample" method="POST" action="{{route('admin.update.password')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Old Password</label>
                            <input type="text" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password" autocomplete="off">
                            @error('old_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">New Password</label>
                            <input type="text" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" autocomplete="off">
                            @error('new_password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" id="new_password_confirmation" name="new_password_confirmation" autocomplete="off">

                        </div>




                        <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>


@endsection