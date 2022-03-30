<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{ route('admin.index')}}" class="logo logo-large"><img src="{{asset('img/logo/yenum-logo-main.png')}}" class="img-fluid" alt="logo"></a>
            <a href="{{ route('admin.index')}}" class="logo logo-small"><img src="{{asset('img/logo/yenum-logo-main.png')}}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{ route('admin.index')}}">
                        <i class="ri-user-6-fill"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="vertical-header"></li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-user-6-line"></i><span>User </span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('users.index')}}">All</a></li>
                        <li><a href="{{ route('users.administrators')}}">Administrators</a></li>
                        <li><a href="{{ route('users.writers')}}">Writers</a></li>
                        <li><a href="{{ route('users.guests')}}">Guests</a></li>
                        <li><a href="{{ route('users.roles')}}">Roles</a></li>
                        <li><a href="{{ route('trashed-users.index')}}">Trash</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-pencil-ruler-line"></i><span>Posts</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('posts.index')}}">All</a></li>
                        <li><a href="{{ route('posts.create')}}">Create</a></li>
                        <li><a href="{{ route('trashed-posts.index')}}">Trash</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-pencil-ruler-2-line"></i><span>Categories</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('categories.index')}}">All</a></li>
                        <li><a href="{{ route('categories.create')}}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-apps-line"></i><span>Tags</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('tags.index')}}">All</a></li>
                        <li><a href="{{ route('tags.create')}}">Create</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javaScript:void();">
                        <i class="ri-apps-line"></i><span>Messages</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('contact.index')}}">All</a></li>
                        <li>
                            <a href="javaScript:void();">Anonymous Message<i class="ri-arrow-right-s-line"></i></a>
                            <ul class="vertical-submenu">
                                <li><a href="{{ route('anonymous-yellow.index')}}">All</a></li>
                                <li><a href="{{ route('anonymous-yellow.published')}}">Published</a></li>
                                <li><a href="{{ route('anonymous-yellow.unpublished')}}">Unpublished</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-file-copy-2-line"></i><span>Media</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{ route('media.index')}}">All</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-pie-chart-line"></i><span>Settings</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Stats</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
