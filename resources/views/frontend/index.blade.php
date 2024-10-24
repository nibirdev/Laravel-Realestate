@extends('frontend.master')

@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- banner-section -->

    @php
        $states = App\Models\State::latest()->get();
        $ptypes = App\Models\propertytype::latest()->get();

    @endphp

    <section class="banner-section" style="background-image: url({{ asset('frontend') }}/assets/images/banner/banner-1.jpg);">
        <div class="auto-container">
            <div class="inner-container">
                <div class="content-box centred">
                    <h2>Create Lasting Wealth Through Realshed</h2>
                    <p>Amet consectetur adipisicing elit sed do eiusmod.</p>
                </div>
                <div class="search-field">
                    <div class="tabs-box">
                        <div class="tab-btn-box">
                            <ul class="tab-btns tab-buttons centred clearfix">
                                <li class="tab-btn active-btn" data-tab="#tab-1">BUY</li>
                                <li class="tab-btn" data-tab="#tab-2">RENT</li>
                            </ul>
                        </div>
                        <div class="tabs-content info-group">
                            <div class="tab active-tab" id="tab-1">
                                <div class="inner-box">
                                    <div class="top-search">
                                        <form action="{{ route('buy.search') }}" method="post" class="search-form">
                                            @csrf
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Property</label>
                                                        <div class="field-input">
                                                            <i class="fas fa-search"></i>
                                                            <input type="search" name="search"
                                                                placeholder="Search by Property, Location or Landmark..."
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <div class="select-box">
                                                            <i class="far fa-compass"></i>
                                                            <select class="wide" name="state">
                                                                <option data-display="Input location">Input location
                                                                </option>

                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->state_name }}">
                                                                        {{ $state->state_name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Property Type</label>
                                                        <div class="select-box">
                                                            <select class="wide">
                                                                <option data-display="All Type" name="ptype_id">All Type
                                                                </option>
                                                                @foreach ($ptypes as $type)
                                                                    <option value="{{ $type->type_name }}">
                                                                        {{ $type->type_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="search-btn">
                                                <button type="submit"><i class="fas fa-search"></i>Search</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <div class="tab" id="tab-2">
                                <div class="inner-box">
                                    <div class="top-search">
                                        <form action="{{ route('rent.search') }}" method="post" class="search-form">
                                            @csrf
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Property</label>
                                                        <div class="field-input">
                                                            <i class="fas fa-search"></i>
                                                            <input type="search" name="search"
                                                                placeholder="Search by Property, Location or Landmark..."
                                                                required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <div class="select-box">
                                                            <i class="far fa-compass"></i>
                                                            <select class="wide" name="state">
                                                                <option data-display="Input location">Input location
                                                                </option>

                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->state_name }}">
                                                                        {{ $state->state_name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Property Type</label>
                                                        <div class="select-box">
                                                            <select class="wide">
                                                                <option data-display="All Type" name="ptype_id">All Type
                                                                </option>
                                                                @foreach ($ptypes as $type)
                                                                    <option value="{{ $type->type_name }}">
                                                                        {{ $type->type_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="search-btn">
                                                <button type="submit"><i class="fas fa-search"></i>Search</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="switch_btn_one ">
                                        <button
                                            class="nav-btn nav-toggler navSidebar-button clearfix search__toggler">Advanced
                                            Search<i class="fas fa-angle-down"></i></button>
                                        <div class="advanced-search">
                                            <div class="close-btn">
                                                <a href="#" class="close-side-widget"><i class="far fa-times"></i></a>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Distance from Location</label>
                                                        <div class="select-box">
                                                            <select class="wide">
                                                                <option data-display="Distance from Location">Distance from
                                                                    Location</option>
                                                                <option value="1">Max Bath</option>
                                                                <option value="2">Within 1 Mile</option>
                                                                <option value="3">Within 2 Mile</option>
                                                                <option value="4">Within 3 Mile</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Bedrooms</label>
                                                        <div class="select-box">
                                                            <select class="wide">
                                                                <option data-display="Max Rooms">Max Rooms</option>
                                                                <option value="1">One Rooms</option>
                                                                <option value="2">Two Rooms</option>
                                                                <option value="3">Three Rooms</option>
                                                                <option value="4">Four Rooms</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Sort by</label>
                                                        <div class="select-box">
                                                            <select class="wide">
                                                                <option data-display="Most Popular">Most Popular</option>
                                                                <option value="1">Top Rating</option>
                                                                <option value="2">New Rooms</option>
                                                                <option value="3">Classic Rooms</option>
                                                                <option value="4">Luxry Rooms</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Floor</label>
                                                        <div class="select-box">
                                                            <select class="wide">
                                                                <option data-display="Select Floor">Select Floor</option>
                                                                <option value="1">One Floor</option>
                                                                <option value="2">Two Floor</option>
                                                                <option value="3">Three Floor</option>
                                                                <option value="4">Four Floor</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Bath</label>
                                                        <div class="select-box">
                                                            <select class="wide">
                                                                <option data-display="Max Bath">Max Bath</option>
                                                                <option value="1">Max Bath</option>
                                                                <option value="2">Max Bath</option>
                                                                <option value="3">Max Bath</option>
                                                                <option value="4">Max Bath</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Agencies</label>
                                                        <div class="select-box">
                                                            <select class="wide">
                                                                <option data-display="Any Agency">Any Agency</option>
                                                                <option value="1">Any Agency</option>
                                                                <option value="2">Agency 01</option>
                                                                <option value="3">Agency 02</option>
                                                                <option value="4">Agency 03</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="range-box">
                                                <div class="row clearfix">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                        <div class="price-range">
                                                            <h6>Select Price Range</h6>
                                                            <div class="range-input">
                                                                <div class="input"><input type="text"
                                                                        class="property-amount" name="field-name"
                                                                        readonly=""></div>
                                                            </div>
                                                            <div class="price-range-slider"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                        <div class="area-range">
                                                            <h6>Select Area</h6>
                                                            <div class="range-input">
                                                                <div class="input"><input type="text"
                                                                        class="area-range" name="field-name"
                                                                        readonly=""></div>
                                                            </div>
                                                            <div class="area-range-slider"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->


    <!-- category-section -->
    @php
        $data = App\Models\propertytype::limit(5)->get();
    @endphp
    <section class="category-section centred">
        <div class="auto-container">
            <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                <ul class="category-list clearfix">
                    @foreach ($data as $item)
                        <li>
                            <div class="category-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="{{ $item->type_icon }}"></i></div>
                                    <h5><a href="{{ route('type.property', $item->id) }}">{{ $item->type_name }}</a></h5>
                                    @php
                                        $number = App\Models\Propertydetail::where('ptype_id', $item->id)->get();

                                    @endphp
                                    <span>{{ count($number) }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
                <div class="more-btn"><a href="categories.html" class="theme-btn btn-one">All Categories</a></div>
            </div>
        </div>
    </section>
    <!-- category-section end -->


    <!-- feature-section -->
    @php
        $detail = App\Models\Propertydetail::where('status', '1')->where('featured', '1')->limit(3)->get();
    @endphp
    <section class="feature-section sec-pad bg-color-1">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>Features</h5>
                <h2>Featured Property</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore
                    magna aliqua enim.</p>
            </div>
            <div class="row clearfix">

                @foreach ($detail as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset($item->property_thambnail) }}"
                                            alt=""></figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            @if ($item->agent_id == null)
                                                <figure class="author-thumb"><img src="{{ url('upload/me.JPG') }}"
                                                        height="60" width="60" alt=""></figure>
                                                <h6>Admin</h6>
                                            @else
                                                <figure class="author-thumb"><img
                                                        src="{{ !empty($item->user->photo) ? url('upload/agent_images/' . $item->user->photo) : url('upload/no_image.jpg') }}"
                                                        style="height:40px; width:40px;" alt=""></figure>
                                                <h6>{{ $item->user->name }}</h6>
                                            @endif

                                        </div>
                                        <div class="buy-btn pull-right"><a href="property-details.html">For
                                                {{ $item->property_status }}</a></div>
                                    </div>
                                    <div class="title-text">
                                        <h4><a
                                                href="{{ url('property/details/' . $item->id . '/' . $item->property_slug) }}">{{ $item->property_name }}</a>
                                        </h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>{{ $item->lowest_price }}</h4>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li>
                                                <a aria-label="Add To Wishlist" class="action-btn"
                                                    id="{{ $item->id }}" onclick="addToWishList(this.id)">
                                                    <i class="icon-13"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="property-details.html">
                                                    <i class="icon-12"></i>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                    <p>{{ $item->short_des }}</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $item->bedrooms }} bed</li>
                                        <li><i class="icon-15"></i>{{ $item->bathrooms }} bath</li>
                                        <li><i class="icon-16"></i>{{ $item->garage }} sq ft</li>
                                    </ul>
                                    <div class="btn-box"><a
                                            href="{{ url('property/details/' . $item->id . '/' . $item->property_slug) }}"
                                            class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="more-btn centred"><a href="property-list.html" class="theme-btn btn-one">View All Listing</a>
            </div>
        </div>
    </section>
    <!-- feature-section end -->


    <!-- video-section -->
    <section class="video-section centred"
        style="background-image: url({{ asset('frontend') }}/assets/images/background/video-1.jpg);">
        <div class="auto-container">
            <div class="video-inner">
                <div class="video-btn">
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&amp;t=28s" class="lightbox-image"
                        data-caption=""><i class="icon-17"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- video-section end -->


    <!-- deals-section -->
    <section class="deals-section sec-pad">
        <div class="auto-container">
            <div class="sec-title">
                <h5>Hot Property</h5>
                <h2>Our Best Deals</h2>
            </div>
            @php
                $hot = App\Models\Propertydetail::where('status', '1')->where('hot', '1')->limit(3)->get();
            @endphp
            <div class="row clearfix">
                @foreach ($hot as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset($item->property_thambnail) }}"
                                            alt=""></figure>
                                    <div class="batch"><i class="icon-11"></i></div>
                                    <span class="category">Featured</span>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            @if ($item->agent_id == null)
                                                <figure class="author-thumb"><img src="{{ url('upload/me.JPG') }}"
                                                        height="60" width="60" alt=""></figure>
                                                <h6>Admin</h6>
                                            @else
                                                <figure class="author-thumb"><img
                                                        src="{{ !empty($item->user->photo) ? url('upload/agent_images/' . $item->user->photo) : url('upload/no_image.jpg') }}"
                                                        style="height:40px; width:40px;" alt=""></figure>
                                                <h6>{{ $item->user->name }}</h6>
                                            @endif

                                        </div>
                                        <div class="buy-btn pull-right"><a href="property-details.html">For
                                                {{ $item->property_status }}</a></div>
                                    </div>
                                    <div class="title-text">
                                        <h4><a
                                                href="{{ url('property/details/' . $item->id . '/' . $item->property_slug) }}">{{ $item->property_name }}</a>
                                        </h4>
                                    </div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>Start From</h6>
                                            <h4>{{ $item->lowest_price }}</h4>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li>
                                                <a aria-label="Add To Wishlist" class="action-btn"
                                                    id="{{ $item->id }}" onclick="addToWishList(this.id)">
                                                    <i class="icon-13"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="property-details.html">
                                                    <i class="icon-12"></i>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                    <p>{{ $item->short_des }}</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>{{ $item->bedrooms }} bed</li>
                                        <li><i class="icon-15"></i>{{ $item->bathrooms }} bath</li>
                                        <li><i class="icon-16"></i>{{ $item->garage }} sq ft</li>
                                    </ul>
                                    <div class="btn-box"><a
                                            href="{{ url('property/details/' . $item->id . '/' . $item->property_slug) }}"
                                            class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach










            </div>

        </div>
    </section>
    <!-- deals-section end -->


    <!-- testimonial-section end -->

    @php
        $testimonial = App\Models\Testimonial::latest()->get();
    @endphp
    <section class="testimonial-section bg-color-1 centred">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-1.png);"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h5>Testimonials</h5>
                <h2>What They Say About Us</h2>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                @foreach ($testimonial as $item)
                    <div class="testimonial-block-one">
                        <div class="inner-box">
                            <figure class="thumb-box"><img src="{{ asset($item->tem_image) }}"
                                    style="height:100px; width:100px;" alt=""></figure>
                            <div class="text">
                                <p>{{ $item->tem_message }}</p>
                            </div>
                            <div class="author-info">
                                <h4>{{ $item->tem_name }}</h4>
                                <span class="designation">{{ $item->tem_position }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- testimonial-section end -->


    <!-- chooseus-section -->
    <section class="chooseus-section">
        <div class="auto-container">
            <div class="inner-container bg-color-2">
                <div class="upper-box clearfix">
                    <div class="sec-title light">
                        <h5>Why Choose Us?</h5>
                        <h2>Reasons To Choose Us</h2>
                    </div>
                    <div class="btn-box">
                        <a href="categories.html" class="theme-btn btn-one">All Categories</a>
                    </div>
                </div>
                <div class="lower-box">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-19"></i></div>
                                    <h4>Excellent Reputation</h4>
                                    <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-26"></i></div>
                                    <h4>Best Local Agents</h4>
                                    <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                            <div class="chooseus-block-one">
                                <div class="inner-box">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h4>Personalized Service</h4>
                                    <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- chooseus-section end -->


    <!-- place-section -->
    @php
        $skip_0 = App\Models\State::skip(0)->first();
        $property_0 = App\Models\Propertydetail::where('state', $skip_0->id)
            ->where('status', 1)
            ->get();

        $skip_1 = App\Models\State::skip(1)->first();
        $property_1 = App\Models\Propertydetail::where('state', $skip_1->id)
            ->where('status', 1)
            ->get();

        $skip_2 = App\Models\State::skip(2)->first();
        $property_2 = App\Models\Propertydetail::where('state', $skip_2->id)
            ->where('status', 1)
            ->get();

        $skip_3 = App\Models\State::skip(3)->first();
        $property_3 = App\Models\Propertydetail::where('state', $skip_3->id)
            ->where('status', 1)
            ->get();
    @endphp
    <section class="place-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>Top Places</h5>
                <h2>Most Popular Places</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore
                    magna aliqua enim.</p>
            </div>
            <div class="sortable-masonry">
                <div class="items-container row clearfix">
                    <div
                        class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img
                                        src="{{ !empty($skip_0->state_image)
                                            ? url('upload/admin_images/state/' . $skip_0->state_image)
                                            : url('upload/no_image.jpg') }}"
                                        style="height:580px; width:370px;" alt=""></figure>
                                <div class="text">
                                    <h4><a href="{{ route('state.details', $skip_0->id) }}">{{ $skip_0->state_name }}</a>
                                    </h4>
                                    <p>{{ count($property_0) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img
                                        src="{{ !empty($skip_1->state_image)
                                            ? url('upload/admin_images/state/' . $skip_1->state_image)
                                            : url('upload/no_image.jpg') }}"
                                        style="height:275px; width:370px;" alt=""></figure>
                                <div class="text">
                                    <h4><a href="{{ route('state.details', $skip_1->id) }}">{{ $skip_1->state_name }}</a>
                                    </h4>
                                    <p>{{ count($property_1) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img
                                        src="{{ !empty($skip_2->state_image)
                                            ? url('upload/admin_images/state/' . $skip_2->state_image)
                                            : url('upload/no_image.jpg') }}"
                                        style="height:275px; width:370px;" alt=""></figure>
                                <div class="text">
                                    <h4><a href="{{ route('state.details', $skip_2->id) }}">{{ $skip_2->state_name }}</a>
                                    </h4>
                                    <p>{{ count($property_2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                        <div class="place-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img
                                        src="{{ !empty($skip_3->state_image)
                                            ? url('upload/admin_images/state/' . $skip_3->state_image)
                                            : url('upload/no_image.jpg') }}"
                                        style="height:275px; width:770px;" alt=""></figure>
                                <div class="text">
                                    <h4><a href="{{ route('state.details', $skip_3->id) }}">{{ $skip_3->state_name }}</a>
                                    </h4>
                                    <p>{{ count($property_3) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- place-section end -->


    <!-- team-section -->
    <section class="team-section sec-pad centred bg-color-1">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-1.png);"></div>
        <div class="auto-container">
            <div class="sec-title">
                <h5>Our Agents</h5>
                <h2>Meet Our Excellent Agents</h2>
            </div>
            <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">

                @php
                    $agents = App\Models\User::where('status', 'active')
                        ->where('role', 'agent')
                        ->limit(5)
                        ->orderBy('id', 'ASC')
                        ->get();
                @endphp
                @foreach ($agents as $agent)
                    <div class="team-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img
                                    src="{{ !empty($agent->photo) ? url('upload/agent_images/' . $agent->photo) : url('upload/no_image.jpg') }}"
                                    style="height:370px; width:370px;" alt=""></figure>
                            <div class="lower-content">
                                <div class="inner">
                                    <h4><a href="{{ route('agentproperty.detail', $agent->id) }}">{{ $agent->name }}</a>
                                    </h4>
                                    <span class="designation">{{ $agent->role }}</span>
                                    <ul class="social-links clearfix">
                                        <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- team-section end -->


    <!-- cta-section -->
    <section class="cta-section bg-color-2">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-2.png);"></div>
        <div class="auto-container">
            <div class="inner-box clearfix">
                <div class="text pull-left">
                    <h2>Looking to Buy a New Property or <br />Sell an Existing One?</h2>
                </div>
                <div class="btn-box pull-right">
                    <a href="property-details.html" class="theme-btn btn-three">Rent Properties</a>
                    <a href="index.html" class="theme-btn btn-one">Buy Properties</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-section end -->


    <!-- news-section -->
    @php
        $blogs = App\Models\Blog::latest()->limit(3)->get();
    @endphp
    <section class="news-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <h5>News & Article</h5>
                <h2>Stay Update With Realshed</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore
                    magna aliqua enim.</p>
            </div>
            <div class="row clearfix">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="{{ url('/blog/details/' . $blog->slug) }}"><img
                                                src="{{ asset($blog->image) }}" alt=""></a></figure>
                                    <span class="category">New</span>
                                </div>
                                <div class="lower-content">
                                    <h4><a href="{{ url('/blog/details/' . $blog->slug) }}">{{ $blog->title }}</a></h4>
                                    <ul class="post-info clearfix">
                                        <li class="author-box">
                                            <figure class="author-thumb"><img
                                                    src="{{ !empty($blog->buser->photo) ? url('upload/admin_images/' . $blog->buser->photo) : url('upload/no_image.jpg') }}"
                                                    alt=""></figure>
                                            <h5><a href="#">{{ $blog->buser->name }}</a></h5>
                                        </li>
                                        <li>{{ $blog->created_at->format('M d Y') }}</li>
                                    </ul>
                                    <div class="text">
                                        <p>{{ $blog->short_des }}</p>
                                    </div>
                                    <div class="btn-box">
                                        <a href="{{ url('/blog/details/' . $blog->slug) }}" class="theme-btn btn-two">See
                                            Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- news-section end -->


    <!-- download-section -->
    <section class="download-section bg-color-3">
        <div class="pattern-layer"
            style="background-image: url({{ asset('frontend') }}/assets/images/shape/shape-3.png);"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image image-1 wow fadeInUp animated" data-wow-delay="00ms"
                            data-wow-duration="1500ms"><img
                                src="{{ asset('frontend') }}/assets/images/resource/download-1.png" alt="">
                        </figure>
                        <figure class="image image-2 wow fadeInUp animated" data-wow-delay="300ms"
                            data-wow-duration="1500ms"><img
                                src="{{ asset('frontend') }}/assets/images/resource/download-2.png" alt="">
                        </figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                    <div class="content_block_1">
                        <div class="content-box">
                            <span>Download</span>
                            <h2>Download Our Android and IOS App for Experience</h2>
                            <div class="download-btn">
                                <a href="index.html" class="app-store">
                                    <i class="fab fa-apple"></i>
                                    <p>Download on</p>
                                    <h4>App Store</h4>
                                </a>
                                <a href="index.html" class="google-play">
                                    <i class="fab fa-google-play"></i>
                                    <p>Get It On</p>
                                    <h4>Google Play</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- download-section end -->



    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })



        // Add To Wishlist
        function addToWishList(property_id) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "/add-to-wishList/" + property_id,
                success: function(data) {
                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message
                }
            })
        }
    </script>
@endsection
