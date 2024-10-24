@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('all.property')}}" class="btn btn-inverse-primary">Add Property</a></li>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit Property</h6>
                        <form class="forms-sample" method="POST" action="{{route('update.property',$property->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Name</label>
                                        <input type="text" class="form-control" name="property_name" value="{{$property->property_name}}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Status</label>
                                        <select name="property_status" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Property</option>
                                            <option value="buy" {{$property->property_status=='buy' ? 'selected':''}}>For Buy</option>
                                            <option value="rent" {{$property->property_status=='rent' ? 'selected':''}}>For Rent</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Lowest Price</label>
                                        <input type="text" class="form-control" name="lowest_price" value="{{$property->lowest_price}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Max Price</label>
                                        <input type="text" class="form-control" name="max_price" value="{{$property->max_price}}">
                                    </div>
                                </div>

                            </div>


                            <!-- Row -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Bedrooms</label>
                                        <input type="text" name="bedrooms" class="form-control" value="{{$property->bedrooms}}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Bathrooms</label>
                                        <input type="text" name="bathrooms" class="form-control" value="{{$property->bathrooms}}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Garage</label>
                                        <input type="text" name="garage" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Garage Size</label>
                                        <input type="text" name="garage_size" class="form-control" value="{{$property->garage_size}}">
                                    </div>
                                </div><!-- Col -->
                            </div>


                            <!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Property Size</label>
                                        <input type="text" name="property_size" class="form-control" value="{{$property->property_size}}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Property Video</label>
                                        <input type="text" name="property_video" class="form-control" value="{{$property->property_video}}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Neighborhood</label>
                                        <input type="text" name="neighborhood" class="form-control" value="{{$property->neighborhood}}">
                                    </div>
                                </div><!-- Col -->
                                <!-- Col -->
                            </div>


                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{$property->address}}">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">State Type</label>
                                        <select name="state" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select State</option>
                                            @foreach($StateType as $type)
                                            <option value="{{$type->id}}" {{$property->state==$type->id ? 'selected':''}}>{{$type->state_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Postal Code</label>
                                        <input type="text" name="postal_code" class="form-control">
                                    </div>
                                </div><!-- Col -->
                            </div>


                            <!-- Row -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Latitude</label>
                                        <input type="text" name="latitude" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Longitude</label>
                                        <input type="text" name="longitude" class="form-control" autocomplete="off">
                                    </div>
                                </div><!-- Col -->
                            </div>

                            <!-- Row -->
                            <!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Property Type</label>
                                        <select name="ptype_id" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Property</option>
                                            @foreach($PropertyType as $type)
                                            <option value="{{$type->id}}" {{$property->ptype_id==$type->id ? 'selected':''}}>{{$type->type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Amenities</label>
                                        <select name="amenities_id[]" class="js-example-basic-multiple form-select form-control" id="exampleFormControlSelect1" + multiple="multiple" data-width="100%">
                                            @foreach($Amenities as $amenities)
                                            <option value="{{$amenities->amenities_name}}" {{(in_array($amenities->amenities_name,$amenit)) ? 'selected':''}}>{{$amenities->amenities_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class=" col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Agent</label>
                                        <select name="agent_id" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Property</option>
                                            @foreach($user as $agent)
                                            <option value="{{$agent->id}}" {{$property->agent_id == $agent->id ? 'selected':''}}>{{$agent->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <!-- Col -->
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Short Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="short_des"></textarea>
                                    </div>
                                </div><!-- Col -->
                            </div>

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <label class="form-label">Long Description</label>

                                            <textarea class="form-control" name="tinymce" name="long_des" id="tinymceExample" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input my-2" name="featured" id="checkInline" value="1" {{$property->featured=='1' ? 'checked':''}}>
                                        <label class="form-check-label" for="checkInline">
                                            Featured
                                        </label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input my-2" id="checkInline" name="hot" value="1" {{$property->featured=='1' ? 'checked':''}}>
                                        <label class="form-check-label" for="checkInline">
                                            Hot
                                        </label>
                                    </div>
                                </div><!-- Col -->
                                <!-- Col -->
                            </div>






                            <button type="submit" class="btn btn-primary submit my-3">Submit form</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- //////Thumbnail Image///// -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Edit Property</h6>
                    <form class="forms-sample" method="POST" action="{{route('update.thumbnail',$property->id)}}" enctype="multipart/form-data">

                        @csrf
                        <input type="hidden" name="id" value="{{$property->id}}">
                        <input type="hidden" name="old_image" value="{{$property->property_thambnail}}">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Image Thambnail</label>
                                    <input type="file" class="form-control" name="property_thumbnail" onChange="mainthambUrl(this)">
                                    <img src="" id="maintham">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label"> </label>
                                    <img src="{{asset($property->property_thambnail)}}" style="height:100px; width:100px;">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary submit my-3">Submit form</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ////End image////// -->


<!-- //////Multiple Image Image///// -->
<form class="forms-sample" method="POST" action="{{route('update.multiimage')}}" enctype="multipart/form-data">
    @csrf


    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Change Image</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Change Image</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($mulimage as $images)

                        <tr>
                            <td>{{$i++}}</td>
                            <td class="py-1">
                                <img src="{{asset($images->photo_name)}}" alt="image">
                            </td>
                            <td>
                                <input type="file" name="multi_img[{{$images->id}}]" class="form-control">

                            </td>

                            <td>
                                <button type="submit" class="btn btn-primary submit my-3">Update Image</button>
                                <a href="{{route('delete.multiimage',$images->id)}}" class="btn btn-outline-danger">Delete</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
<!-- //////End Multiple Image Image///// -->

<!-- //////Add New Multiple Image///// -->
<form class="forms-sample" method="POST" action="{{route('add.multiimage')}}" enctype="multipart/form-data">
    @csrf


    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add New MultiImage</h4>

            <div class="table-responsive">
                <table class="table table-striped">

                    <tbody>
                        <input type="hidden" name="id" class="form-control" value="{{$property->id}}">

                        <tr>

                            <td>
                                <input type="file" name="addmulti_img" class="form-control">

                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary submit ">Add Image</button>

                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</form>
<!-- //////End Multiple Image Image///// -->



<!--========== Start of add multiple Facilities class with ajax ==============-->
<form class="forms-sample" method="POST" action="{{route('update.facility')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$property->id}}">
    @php
    $i=1;
    @endphp

    <div class="row add_item">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                <div class="container mt-2">
                    @foreach($facilities as $facility)
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="facility_name">Facilities</label>

                            <select name="facility_name[]" id="facility_name" class="form-control">
                                <option value="">Select Facility</option>
                                <option value="Hospital" {{$facility->facilities_name=='Hospital'?'selected':''}}>Hospital</option>
                                <option value="SuperMarket" {{$facility->facilities_name=='SuperMarket'?'selected':''}}>Super Market</option>
                                <option value="School" {{$facility->facilities_name=='School'?'selected':''}}>School</option>
                                <option value="Entertainment" {{$facility->facilities_name=='Entertainment'?'selected':''}}>Entertainment</option>
                                <option value="Pharmacy" {{$facility->facilities_name=='Pharmacy'?'selected':''}}>Pharmacy</option>
                                <option value="Airport" {{$facility->facilities_name=='Airport'?'selected':''}}>Airport</option>
                                <option value="Railways" {{$facility->facilities_name=='Railways'?'selected':''}}>Railways</option>
                                <option value="Bus Stop" {{$facility->facilities_name=='Bus Stop'?'selected':''}}>Bus Stop</option>
                                <option value="Beach" {{$facility->facilities_name=='Beach'?'selected':''}}>Beach</option>
                                <option value="Mall" {{$facility->facilities_name=='Mall'?'selected':''}}>Mall</option>
                                <option value="Bank" {{$facility->facilities_name=='Bank'?'selected':''}}>Bank</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="distance">Distance</label>
                            <input type="text" name="distance[]" id="distance" class="form-control" value="{{$facility->distance}}">
                        </div>
                        <div class="form-group col-md-4" style="padding-top: 20px">
                            <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                            <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remove</i></span>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary submit m-2">Update Facility</button>



</form>







<!-- add more Hidden-->
<!--========== Start of add multiple class with ajax ==============-->
<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="whole_extra_item_delete" id="whole_extra_item_delete">
            <div class="container mt-2">
                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="facility_name">Facilities</label>
                        <select name="facility_name[]" id="facility_name" class="form-control">
                            <option value="">Select Facility</option>
                            <option value="Hospital">Hospital</option>
                            <option value="SuperMarket">Super Market</option>
                            <option value="School">School</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Pharmacy">Pharmacy</option>
                            <option value="Airport">Airport</option>
                            <option value="Railways">Railways</option>
                            <option value="Bus Stop">Bus Stop</option>
                            <option value="Beach">Beach</option>
                            <option value="Mall">Mall</option>
                            <option value="Bank">Bank</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="distance">Distance</label>
                        <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (Km)">
                    </div>
                    <div class="form-group col-md-4" style="padding-top: 20px">
                        <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                        <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remove</i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<script>
    function mainthambUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#maintham').attr('src', e.target.result).width(80).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }

    }
</script>


@endsection