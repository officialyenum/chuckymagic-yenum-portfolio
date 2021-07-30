<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{url('/')}}" class="logo logo-large"><img src="{{asset('img/logo/yenum-logo-main.png')}}" class="img-fluid" alt="logo"></a>
            <a href="{{url('/')}}" class="logo logo-small"><img src="{{asset('img/logo/yenum-logo-main.png')}}" class="img-fluid" alt="logo"></a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li>
                    <a href="{{url('/')}}">
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
                        <li><a href="">Administrators</a></li>
                        <li><a href="">Writers</a></li>
                        <li><a href="">Guests</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-pencil-ruler-line"></i><span>Posts</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('/basic-ui-kits-alerts')}}">All</a></li>
                        <li><a href="{{url('/basic-ui-kits-badges')}}">This Week</a></li>
                        <li><a href="{{url('/basic-ui-kits-buttons')}}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-pencil-ruler-2-line"></i><span>Categories</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="#">Image Crop</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-apps-line"></i><span>Tags</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('/apps-calender')}}">Calender</a></li>
                        <li><a href="{{url('/apps-chat')}}">Chat</a></li>
                        <li>
                            <a href="javaScript:void();">Email<i class="ri-arrow-right-s-line"></i></a>
                            <ul class="vertical-submenu">
                                <li><a href="{{url('/apps-email-inbox')}}">Inbox</a></li>
                                <li><a href="{{url('/apps-email-open')}}">Open</a></li>
                                <li><a href="{{url('/apps-email-compose')}}">Compose</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('/apps-kanban-board')}}">Kanban Board</a></li>
                        <li><a href="{{url('/apps-onboarding-screens')}}">Onboarding Screens</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-file-copy-2-line"></i><span>Media</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('/form-inputs')}}">Basic Elements</a></li>
                        <li><a href="{{url('/form-groups')}}">Groups</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javaScript:void();">
                        <i class="ri-pie-chart-line"></i><span>Settings</span><i class="ri-arrow-right-s-line"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li><a href="{{url('/chart-apex')}}">Apex</a></li>
                        <li><a href="{{url('/chart-c3')}}">C3</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
