@extends('admin.admin_dashboard')

@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('all.state')}}" class="btn btn-inverse-primary">Add Property</a></li>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Testimonial</h6>

                        <form class="forms-sample" method="POST" action="{{route('testimonial.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="state_name" class="form-label">Testimonial Name</label>
                                <input type="text" class="form-control" id="state_name" name="tem_name" value="{{old('state_name')}}" autocomplete="off">

                            </div>
                            <div class="mb-3">
                                <label for="state_name" class="form-label">Testimonial Position</label>
                                <input type="text" class="form-control" id="state_name" name="tem_position" autocomplete="off">

                            </div>
                            <div class="mb-3">
                                <label for="state_name" class="form-label">Testimonial Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="tem_message"></textarea>

                            </div>

                            <div class="mb-3">
                                <label for="state_image" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="state_image" name="tem_image">

                            </div>

                            <div class="mb-3">
                                <label for="showImage" class="form-label"></label>
                                <img id="showImage" class="wd-60 rounded-circle" src="{{ url('upload/no_image.jpg') }}" alt="profile">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]); // Corrected line
        });
    });
</script> -->
<script>
    document.getElementById('state_image').addEventListener('change', function() {
        const [file] = this.files;
        if (file) {
            document.getElementById('showImage').src = URL.createObjectURL(file);
        }
    });
</script>
@endsection