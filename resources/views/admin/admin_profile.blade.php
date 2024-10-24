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

                    <h6 class="card-title">Admin Update Panel</h6>

                    <form class="forms-sample" method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" autocomplete="off" value="{{$profiledata->username}}">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$profiledata->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$profiledata->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" id="phone" name="phone" autocomplete="off" value="{{$profiledata->phone}}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" autocomplete="off" value="{{$profiledata->address}}">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image" name="photo">
                        </div>
                        <div class="mb-3">
                            <label for="showImage" class="form-label"></label>
                            <img class="wd-60 rounded-circle" id="showImage" src="{{ (!empty($profiledata->photo)) ? 
                            url('upload/admin_images/'.$profiledata->photo) : url('upload/no_image.jpg')}}" alt="profile">
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]); // Corrected line
        });
    });
</script>

@endsection