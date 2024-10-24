@extends('frontend.master')


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






@section('main')
<!--Page Title-->
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('frontend')}}/assets/images/shape/shape-9.png);"></div>
        <div class="pattern-2" style="background-image: url({{asset('frontend')}}/assets/images/shape/shape-10.png);"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Agent Log-In</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Sign In</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- ragister-section -->
<section class="ragister-section centred sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                <div class="sec-title">
                    <h5>Sign in For Agent</h5>
                    <h2>Sign In With Realshed</h2>
                </div>
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Login</li>
                            <li class="tab-btn" data-tab="#tab-2">Register</li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <h4>Sign in</h4>
                                <form method="POST" action="{{route('login')}}" class=" default-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email/Name/Phone</label>
                                        <input type="text" name="login" required="" id="login">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" required="">
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Log in</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="tab" id="tab-2">
                            <div class="inner-box">
                                <h4>Register</h4>
                                <form method="POST" action="{{route('agent.register')}}" class="default-form">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" id="email" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" id="phone" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" name="password_confirmation" class="block mt-1 w-full" required autocomplete="new-password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="block mt-1 w-full" required autocomplete="new-password">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Sign up</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ragister-section end -->


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
@endsection('main')