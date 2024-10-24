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
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Testimonial</h6>

                        <form class="forms-sample" method="POST" action="{{route('blog.post.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="state_name" class="form-label">Title</label>
                                <input type="text" class="form-control" id="state_name" name="title" value="{{old('state_name')}}" autocomplete="off">

                            </div>
                            <div class="mb-3">
                                <label for="state_name" class="form-label">Short Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="short_des"></textarea>

                            </div>
                            <div class="mb-3">
                                <label for="state_name" class="form-label">Long Description</label>
                                <textarea class="form-control" name="long_des" id="tinymceExample" rows="10"></textarea>
                            </div>



                            <div class="mb-3">
                                <label class="form-label">Category ID</label>
                                <select name="cat_id" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Property</option>
                                    @foreach($blog as $blogs)
                                    <option value="{{$blogs->id}}">{{$blogs->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="state_name" class="form-label">Tags</label>
                                <input name="tag" id="tags" value="New York" />

                            </div>

                            <div class="mb-3">
                                <label for="state_image" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="state_image" name="image">

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