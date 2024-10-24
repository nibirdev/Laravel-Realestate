<div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
    <div class="blog-sidebar">
        <div class="sidebar-widget post-widget">
            <div class="widget-title">
                <h4>User Profile </h4>
            </div>
            <div class="post-inner">
                <div class="post">
                    <figure class="post-thumb"><a href="blog-details.html">
                            <img src="{{ !empty($data->photo) ? url('upload/user_images/' . $data->photo) : url('upload/no_image.jpg') }}"
                                alt=""></a></figure>
                    <h5><a href="blog-details.html">{{ $data->name }} </a></h5>
                    <p>{{ $data->email }} </p>
                </div>
            </div>
        </div>
        <div class="sidebar-widget category-widget">
            <div class="widget-title">
                <h4>Category</h4>
            </div>
            <div class="widget-content">
                <ul class="category-list ">

                    <li class="current"> <a href="{{ route('dashboard') }}"><i class="fab fa fa-envelope "></i>
                            Dashboard </a></li>
                    <li><a href="{{ route('user.setting') }}"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                    </li>

                    <li><a href="{{ route('user.schedule.request') }}"><i class="fa fa-credit-card"
                                aria-hidden="true"></i>Schedule Request <span class="badge badge-info">( )</span></a>
                    </li>
                    <li><a href="{{ route('change.password') }}"><i class="fa fa-key" aria-hidden="true"></i>Edit
                            Password </a></li>
                    <li><a href="{{ route('user.logout') }}"><i class="fa fa-chevron-circle-up" aria-hidden="true"></i>
                            Logout </a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
