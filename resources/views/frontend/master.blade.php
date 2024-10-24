@include('frontend.body.top')




<!-- preloader -->
@include('frontend.body.preloader')
<!-- preloader end -->


<!-- switcher menu -->

<!-- end switcher menu -->


<!-- main header -->
@include('frontend.body.header')
<!-- main-header end -->

<!-- Mobile Menu  -->
@include('frontend.body.mobilemenu')
<!-- End Mobile Menu -->

@yield('main')

@include('frontend.body.footer')