@extends('agent.agent_master')

@section('agent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('agent.all.property')}}" class="btn btn-inverse-primary">Add Property</a></li>

        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Property Grid</h6>
                        <form class="forms-sample" method="POST" action="{{route('agent.store.property')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Name</label>
                                        <input type="text" class="form-control" name="property_name">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Status</label>
                                        <select name="property_status" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Property</option>
                                            <option value="buy">Buy</option>
                                            <option value="rent">Rent</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Lowest Price</label>
                                        <input type="text" class="form-control" name="lowest_price">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Max Price</label>
                                        <input type="text" class="form-control" name="max_price">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Image Thambnail</label>
                                        <input type="file" class="form-control" name="property_thumbnail" onChange="mainthambUrl(this)">
                                        <img src="" id="maintham">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Multiple Image</label>
                                        <input type="file" class="form-control" name="multi_image[]" id="multiImg" multiple="">
                                        <div class="row py-1" id="preview_img"> </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Row -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Bedrooms</label>
                                        <input type="text" name="bedrooms" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Bathrooms</label>
                                        <input type="text" name="bathrooms" class="form-control">
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
                                        <input type="text" name="garage_size" class="form-control">
                                    </div>
                                </div><!-- Col -->
                            </div>


                            <!-- Row -->
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Property Size</label>
                                        <input type="text" name="property_size" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Property Video</label>
                                        <input type="text" name="property_video" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="mb-3">
                                        <label class="form-label">Neighborhood</label>
                                        <input type="text" name="neighborhood" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <!-- Col -->
                            </div>


                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control">
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
                                            <option value="{{$type->id}}">{{$type->state_name}}</option>
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
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property Type</label>
                                        <select name="ptype_id" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Property</option>
                                            @foreach($PropertyType as $type)
                                            <option value="{{$type->id}}">{{$type->type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Amenities</label>
                                        <select name="amenities_id[]" class="js-example-basic-multiple form-select form-control" id="exampleFormControlSelect1" + multiple="multiple" data-width="100%">
                                            @foreach($Amenities as $amen)
                                            <option value="{{$amen->amenities_name}}">{{$amen->amenities_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <!-- Col -->
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

                                            <textarea class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Col -->

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input my-2" id="checkInline" value="1" name="featured">
                                        <label class="form-check-label" for="checkInline">
                                            Featured
                                        </label>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-4">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input my-2" id="checkInline" value="1" name="hot">
                                        <label class="form-check-label" for="checkInline">
                                            Hot
                                        </label>
                                    </div>
                                </div><!-- Col -->
                                <!-- Col -->
                            </div>

                            <!-- Add more facilities -->
                            <div class="row add_item">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="facility_name" class="form-label">Facilities </label>
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
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="distance" class="form-label"> Distance </label>
                                        <input type="text" name="distance[]" id="distance" class="form-control" placeholder="Distance (Km)">
                                    </div>
                                </div>
                                <div class="form-group col-md-4" style="padding-top: 30px;">
                                    <a class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> Add More..</a>
                                </div>
                            </div>

                            <!---end row-->





                            <button type="submit" class="btn btn-primary submit my-3">Submit form</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


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