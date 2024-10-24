<!-- main-footer -->

@php
$setting = App\Models\SiteSetting::find(1);
$blog = App\Models\Blog::latest()->limit(2)->get();
@endphp

<footer class="main-footer">
    <div class="footer-top bg-color-2">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget about-widget">
                        <div class="widget-title">
                            <h3>About</h3>
                        </div>
                        <div class="text">
                            <p>Lorem ipsum dolor amet consetetur adi pisicing elit sed eiusm tempor in cididunt ut labore dolore magna aliqua enim ad minim venitam</p>
                            <p>Quis nostrud exercita laboris nisi ut aliquip commodo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            <h3>Services</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list class">
                                <li><a href="index.html">About Us</a></li>
                                <li><a href="index.html">Listing</a></li>
                                <li><a href="index.html">How It Works</a></li>
                                <li><a href="index.html">Our Services</a></li>
                                <li><a href="index.html">Our Blog</a></li>
                                <li><a href="index.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget post-widget">
                        <div class="widget-title">
                            <h3>Top News</h3>
                        </div>
                        <div class="post-inner">
                            @foreach($blog as $item)
                            <div class="post">
                                <figure class="post-thumb"><a href="{{ url('blog/details/'.$item->post_slug) }}"><img src="{{ asset($item->image) }}" alt=""></a></figure>
                                <h5><a href="{{ url('blog/details/'.$item->post_slug) }}">{{ $item->title }}</a></h5>
                                <p>{{ $item->created_at->format('M d Y') }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>Contacts</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                <li><i class="fas fa-map-marker-alt"></i>{{ $setting->company_address }}</li>
                                <li><i class="fas fa-microphone"></i><a href="tel:23055873407">{{ $setting->support_phone }}</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:info@example.com">{{ $setting->email }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-box clearfix">
                <figure class="footer-logo"><a href="index.html"><img src="{{asset('frontend')}}/assets/images/footer-logo.png" alt=""></a></figure>
                <div class="copyright pull-left">
                    <p><a href="index.html">{{ $setting->copyright }}</a> &copy; 2024 All Right Reserved</p>
                </div>
                <ul class="footer-nav pull-right clearfix">
                    <li><a href="index.html">Terms of Service</a></li>
                    <li><a href="index.html">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->



<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fal fa-angle-up"></span>
</button>
</div>


<!-- jequery plugins -->
<script src="{{asset('frontend')}}/assets/js/jquery.js"></script>
<script src="{{asset('frontend')}}/assets/js/popper.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/owl.js"></script>
<script src="{{asset('frontend')}}/assets/js/wow.js"></script>
<script src="{{asset('frontend')}}/assets/js/validation.js"></script>
<script src="{{asset('frontend')}}/assets/js/jquery.fancybox.js"></script>
<script src="{{asset('frontend')}}/assets/js/appear.js"></script>
<script src="{{asset('frontend')}}/assets/js/scrollbar.js"></script>
<script src="{{asset('frontend')}}/assets/js/isotope.js"></script>
<script src="{{asset('frontend')}}/assets/js/jquery.nice-select.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/jQuery.style.switcher.min.js"></script>
<script src="{{asset('frontend')}}/assets/js/jquery-ui.js"></script>
<script src="{{asset('frontend')}}/assets/js/nav-tool.js"></script>

<!-- map script -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
<script src="{{asset('frontend/assets/js/gmaps.js')}}"></script>
<script src="{{asset('frontend/assets/js/map-helper.js')}}"></script>
<!-- End map script -->

<!-- toaster js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch (type) {
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- main-js -->
<script src="{{asset('frontend')}}/assets/js/script.js"></script>

<!-- //image show javascript -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>



<!-- For wishlist route and message -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
                });

                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success,
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.error,
                    });
                }
                // End Message  
            }
        });
    }
</script>



</body> <!--End of .page_wrapper-- >

</html>