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
<section class="page-title centred" style="background-image: url({{asset('frontend')}}/assets/images/background/page-title-5.jpg);">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Edit Password </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Edit Password </li>
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
                                <h3>Update Password</h3>



                                <form class="forms-sample" method="POST" action="{{route('user.update.password')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Old Password</label>
                                        <input type="text" class="form-control @error('old_password') is-invalid 
                                        @enderror" id="old_password" name="old_password" autocomplete="off">
                                        @error('old_password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">New Password</label>
                                        <input type="text" class="form-control @error('new_password') is-invalid
                                         @enderror" id="new_password" name="new_password" autocomplete="off">
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


        </div>
    </div>
</section>
<!-- sidebar-page-container -->

<!-- subscribe-section -->
<section class="subscribe-section bg-color-3">
    <div class="pattern-layer" style="background-image: url({{asset('frontend')}}/assets/images/shape/shape-2.png);"></div>
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