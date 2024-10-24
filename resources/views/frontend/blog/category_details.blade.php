@extends('frontend.master')

@section('main')
<!--Page Title-->
<section class="page-title centred" style="background-image: url({{asset('frontend')}}/assets/images/background/page-title-5.jpg);">
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Blog Details</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Blog Details</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- sidebar-page-container -->
<section class="blog-list sec-pad-2">
    <div class="auto-container">
        <div class="row clearfix">
            @foreach($blogs as $blog)
            <div class="col-lg-6 col-md-12 col-sm-12 news-block">
                <div class="news-block-two wow fadeInLeft animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box align-items-center">
                        <div class="image-box">
                            <figure class="image"><a href="blog-details.html"><img src="{{asset($blog->image)}}" style="height:357px; width:260px;" alt=""></a></figure>
                            <a href="blog-details.html" class="feature">Featured</a>
                        </div>
                        <div class="content-box">
                            <h4><a href="{{url('/blog/details/'.$blog->slug)}}">{{$blog->title}}</a></h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img src="{{ (!empty($blog->buser->photo)) ? 
                                    url('upload/admin_images/'.$blog->buser->photo) : url('upload/no_image.jpg')}}" alt=""></figure>
                                    <h5><a href="{{url('/blog/details/'.$blog->slug)}}">{{$blog->buser->name}}</a></h5>
                                </li>
                                <li>{{$blog->created_at->format('M d Y')}}</li>
                            </ul>
                            <p>{{$blog->short_des}}</p>
                            <div class="btn-box">
                                <a href="{{url('/blog/details/'.$blog->slug)}}" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-wrapper">
            <ul class="pagination clearfix">
                <li><a href="blog-2.html" class="current">1</a></li>
                <li><a href="blog-2.html">2</a></li>
                <li><a href="blog-2.html">3</a></li>
                <li><a href="blog-2.html"><i class="fas fa-angle-right"></i></a></li>
            </ul>
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