<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="dashboard.html" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">web apps</li>

            <!-- Property Type -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#propertytype" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Propertytype</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="propertytype">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.type')}}" class="nav-link">All Property</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.type')}}" class="nav-link">Add Property</a>
                        </li>

                    </ul>
                </div>
            </li>


            <!-- State Type -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#state" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">State Type</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="state">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.state')}}" class="nav-link">All State</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.state')}}" class="nav-link">Add State</a>
                        </li>

                    </ul>
                </div>
            </li>

            <!-- Testimonial -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#testimonial" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Testimonial</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="testimonial">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.testimonial')}}" class="nav-link">All Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.testimonial')}}" class="nav-link">Add Testimonial</a>
                        </li>

                    </ul>
                </div>
            </li>



            <!-- Amenities -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Amenities</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.amenities')}}" class="nav-link">All Amenities</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.amenities')}}" class="nav-link">Add Amenities</a>
                        </li>

                    </ul>
                </div>
            </li>

            <!-- Property Details -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Property Details</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.property')}}" class="nav-link">All Property</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.property')}}" class="nav-link">Add Property</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Permission -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#perm" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Permission</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="perm">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.permission')}}" class="nav-link">All Permission</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.permission')}}" class="nav-link">Add Permission</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Permission -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#roles" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Roles</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="roles">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.roles')}}" class="nav-link">All Roles</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.roles')}}" class="nav-link">Add Roles</a>
                        </li>
                    </ul>
                </div>
            </li>



            <!-- Roles Permission -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#roles_permission" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Roles Permission</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="roles_permission">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.roles.permission')}}" class="nav-link">All Roles Permission</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.roles.permission')}}" class="nav-link">Add Roles Permission</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Add Admin-->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#addadmin" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Add Admin</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="addadmin">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.admin')}}" class="nav-link">All Admin</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.admin')}}" class="nav-link">Add Admin</a>
                        </li>
                    </ul>
                </div>
            </li>


            <!-- Package History -->
            <li class="nav-item">
                <a href="{{route('admin.history.package')}}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Package History</span>
                </a>
            </li>


            <!-- Blog Category -->
            <li class="nav-item">
                <a href="{{route('all.blog.category')}}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Blog Category</span>
                </a>
            </li>


            <!-- Blog Content -->

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#blog" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Blog Post</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="blog">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.blog.post')}}" class="nav-link">All Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.blog.post')}}" class="nav-link">Add Blog</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!--  Blog Comment -->
            <li class="nav-item">
                <a href="{{ route('admin.blog.comment') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Blog Comment </span>
                </a>
            </li>

            <!-- Site Settings -->
            <li class="nav-item">
                <a href="{{ route('site.setting') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Site Setting </span>
                </a>
            </li>










            <li class="nav-item nav-category">Components</li>


            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">Agent</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.agent')}}" class="nav-link">All Agent</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.agent')}}" class="nav-link">Add Agent</a>
                        </li>
                    </ul>
                </div>
            </li>



            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>