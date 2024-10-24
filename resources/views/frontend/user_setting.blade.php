@extends('frontend.master')

@section('main')
<!-- switcher menu -->
<div class="switcher">
    <div class="switch_btn">
        <button><i class="fas fa-palette"></i></button>
    </div>
    <div class="switch_menu">
        <!-- color changer -->
        <div class="switcher_container">
            <ul id="styleOptions" title="switch styling">
                <li>
                    <a href="javascript: void(0)" data-theme="green" class="green-color"></a>
                </li>
                <li>
                    <a href="javascript: void(0)" data-theme="pink" class="pink-color"></a>
                </li>
                <li>
                    <a href="javascript: void(0)" data-theme="violet" class="violet-color"></a>
                </li>
                <li>
                    <a href="javascript: void(0)" data-theme="crimson" class="crimson-color"></a>
                </li>
                <li>
                    <a href="javascript: void(0)" data-theme="orange" class="orange-color"></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- end switcher menu -->






<!--Page Title-->
<section class="page-title centred" style="background-image: url(assets/images/background/page-title-5.jpg);">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>User Profile </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>User Profile </li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- sidebar-page-container -->
<section class="sidebar-page-container blog-details sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">
            @php
            $id=Auth::user()->id;
            $data=App\Models\User::find($id);
            @endphp







            <!-- user dashboards sidebar -->
            @include('frontend.body.userdashboardsidebar')
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="blog-details-content">
                    <div class="news-block-one">
                        <div class="inner-box">

                            <div class="lower-content">
                                <h3>Including Animation In Your Design System.</h3>
                                <ul class="post-info clearfix">
                                    <li class="author-box">
                                        <figure class="author-thumb"><img src="assets/images/news/author-1.jpg" alt=""></figure>
                                        <h5><a href="blog-details.html">Eva Green</a></h5>
                                    </li>
                                    <li>April 10, 2020</li>
                                </ul>


                                <form class="forms-sample" method="POST" action="{{route('user.setting.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" value="{{$userdata->username}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$userdata->name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$userdata->email}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="phone" class="form-control" id="phone" name="phone" autocomplete="off" value="{{$userdata->phone}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" autocomplete="off" value="{{$userdata->address}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Photo</label>
                                        <input type="file" class="form-control" id="image" name="photo">
                                    </div>
                                    <div class="mb-3 show">
                                        <label for="showImage" class="form-label"></label>
                                        <img class="wd-40 rounded-circle" id="showImage" src="{{ (!empty($userdata->photo)) ? 
                            url('upload/user_images/'.$userdata->photo) : url('upload/no_image.jpg')}}" alt="profile">
                                    </div>

                                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                </form>



                            </div>
                        </div>
                    </div>


                </div>


            </div>


        </div>
    </div>
</section>
<!-- sidebar-page-container -->

<!-- subscribe-section -->
<section class="subscribe-section bg-color-3">
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                <div class="text">
                    <span>Subscribe</span>
                    <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                <div class="form-inner">
                    <form action="contact.html" method="post" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your email" required="">
                            <button type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe-section end -->


@endsection