<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Minaati is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, admin theme, bootstrap 4, responsive, sass support, ui kits, crm, ecommerce">
    <meta name="author" content="Themesbox17">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin || Yenum</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico')}}">
    <!-- Start css -->
    <!-- Switchery css -->
    <link href="{{ asset('admin/plugins/switchery/switchery.min.css')}}" rel="stylesheet">
    <!-- Apex css -->
    <link href="{{ asset('admin/plugins/apexcharts/apexcharts.css')}}" rel="stylesheet">
    <!-- Slick css -->
    <link href="{{ asset('admin/plugins/slick/slick.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/plugins/slick/slick-theme.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
    <!-- Start Infobar Setting Sidebar -->
    <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
            <h4>Settings</h4><a href="javascript:void(0)" id="infobar-settings-close" class="infobar-settings-close"><i class="ri-close-line menu-hamburger-close"></i></a>
        </div>
        <div class="infobar-settings-sidebar-body">
            <div class="custom-mode-setting">
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Payment Reminders</h6></div>
                    <div class="col-4"><input type="checkbox" class="js-switch-setting-first" checked /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Stock Updates</h6></div>
                    <div class="col-4"><input type="checkbox" class="js-switch-setting-second" checked /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Open for New Products</h6></div>
                    <div class="col-4"><input type="checkbox" class="js-switch-setting-third" /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Enable SMS</h6></div>
                    <div class="col-4"><input type="checkbox" class="js-switch-setting-fourth" checked /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Newsletter Subscription</h6></div>
                    <div class="col-4"><input type="checkbox" class="js-switch-setting-fifth" checked /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">Show Map</h6></div>
                    <div class="col-4"><input type="checkbox" class="js-switch-setting-sixth" /></div>
                </div>
                <div class="row align-items-center pb-3">
                    <div class="col-8"><h6 class="mb-0">e-Statement</h6></div>
                    <div class="col-4"><input type="checkbox" class="js-switch-setting-seventh" checked /></div>
                </div>
                <div class="row align-items-center">
                    <div class="col-8"><h6 class="mb-0">Monthly Report</h6></div>
                    <div class="col-4"><input type="checkbox" class="js-switch-setting-eightth" checked /></div>
                </div>
            </div>
        </div>
    </div>
    <div class="infobar-settings-sidebar-overlay"></div>
    <!-- End Infobar Setting Sidebar -->
    <!-- Start Containerbar -->
    <div id="containerbar">
        <!-- Start Leftbar -->
        <div class="leftbar bg-grey">
            <!-- Start Sidebar -->
            <div class="sidebar">
                <!-- Start Logobar -->
                <div class="logobar">
                    <a href="index.html" class="logo logo-large"><img src="{{ asset('img/logo/yenumcomlight.png')}}" class="img-fluid" alt="logo"></a>
                    <a href="index.html" class="logo logo-small"><img src="{{ asset('img/logo/yenumcomdark.png')}}" class="img-fluid" alt="logo"></a>
                </div>
                <!-- End Logobar -->
                <!-- Start Navigationbar -->
                <div class="navigationbar">
                    <ul class="vertical-menu">
                        <li>
                            <a href="#">
                                <i class="ri-dashboard-fill"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="vertical-header"></li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="ri-pencil-ruler-line"></i><span>Projects</span><i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="#">All</a></li>
                                <li><a href="#">Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="ri-pencil-ruler-2-line"></i><span>Categories</span><i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="#">All</a></li>
                                <li><a href="#">Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                              <i class="ri-apps-line"></i><span>Sub Categories</span><i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="#">All</a></li>
                                <li><a href="#">Create</a></li>
                                <li>
                                    <a href="javaScript:void();">Test<i class="ri-arrow-right-s-line"></i></a>
                                    <ul class="vertical-submenu">
                                        <li><a href="#">Test 1</a></li>
                                        <li><a href="#">Test 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="ri-file-copy-2-line"></i><span>Frameworks</span><i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="form-inputs.html">All</a></li>
                                <li><a href="form-groups.html">Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javaScript:void();">
                                <i class="ri-pie-chart-line"></i><span>Languages</span><i class="ri-arrow-right-s-line"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li><a href="chart-apex.html">All</a></li>
                                <li><a href="chart-apex.html">Create</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="widgets.html">
                                <i class="ri-palette-line"></i><span>Widgets</span><span class="new-icon"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Navigationbar -->
            </div>
            <!-- End Sidebar -->
        </div>
        <!-- End Leftbar -->
        <!-- Start Rightbar -->
        <div class="rightbar">
            <!-- Start Topbar Mobile -->
            <div class="topbar-mobile">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="mobile-logobar">
                            <a href="index.html" class="mobile-logo"><img src="{{ asset('images/logo.svg')}}" class="img-fluid" alt="logo"></a>
                        </div>
                        <div class="mobile-togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="topbar-toggle-icon">
                                        <a class="topbar-toggle-hamburger" href="javascript:void();">
                                            <i class="ri-more-fill menu-hamburger-horizontal"></i>
                                            <i class="ri-more-2-fill menu-hamburger-vertical"></i>
                                         </a>
                                     </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                            <i class="ri-close-line menu-hamburger-close"></i>
                                         </a>
                                     </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Topbar -->
            <div class="topbar">
                <!-- Start row -->
                <div class="row align-items-center">
                    <!-- Start col -->
                    <div class="col-md-12 align-self-center">
                        <div class="togglebar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="menubar">
                                        <a class="menu-hamburger" href="javascript:void();">
                                            <i class="ri-menu-2-line menu-hamburger-collapse"></i>
                                            <i class="ri-close-line menu-hamburger-close"></i>
                                         </a>
                                     </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="searchbar">
                                        <form>
                                            <div class="input-group">
                                              <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                              <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon2"><i class="ri-search-2-line"></i></button>
                                              </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="infobar">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <div class="settingbar">
                                        <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon"><i class="ri-settings-line"></i></a>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="notifybar">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ri-notification-line"></i>
                                            <span class="live-icon"></span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                                <div class="notification-dropdown-title">
                                                    <h5>Notifications<a href="#">Clear all</a></h5>
                                                </div>
                                                <ul class="list-unstyled">
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-primary"><i class="ri-bank-card-2-line"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">Payment Success !!!</h5>
                                                            <p><span class="timing">Today, 09:05 AM</span></p>
                                                        </div>
                                                    </li>
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-success"><i class="ri-file-user-line"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">Riva applied for job</h5>
                                                            <p><span class="timing">Yesterday, 02:30 PM</span></p>
                                                        </div>
                                                    </li>
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-secondary"><i class="ri-pencil-line"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">Maria requested to leave</h5>
                                                            <p><span class="timing">5 June 2020, 12:10 PM</span></p>
                                                        </div>
                                                    </li>
                                                    <li class="media dropdown-item">
                                                        <span class="action-icon badge badge-warning"><i class="ri-shopping-cart-line"></i></span>
                                                        <div class="media-body">
                                                            <h5 class="action-title">New order placed</h5>
                                                            <p><span class="timing">1 Jun 2020, 04:40 PM</span></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="notification-dropdown-footer">
                                                    <h5><a href="#">See all</a></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="languagebar">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag flag-icon-us flag-icon-squared"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-us flag-icon-squared"></i>English</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-de flag-icon-squared"></i>German</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-bl flag-icon-squared"></i>France</a>
                                                <a class="dropdown-item" href="#"><i class="flag flag-icon-ru flag-icon-squared"></i>Russian</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="profilebar">
                                        <div class="dropdown">
                                          <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('admin/images/users/profile.svg')}}" class="img-fluid" alt="profile"><span class="live-icon">{{ Auth::user()->name }}</span></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                                <a class="dropdown-item" href="#"><i class="ri-user-6-line"></i>My Profile</a>
                                                <a class="dropdown-item" href="#"><i class="ri-mail-line"></i>Email</a>
                                                <a class="dropdown-item" href="#"><i class="ri-settings-3-line"></i>Settings</a>
                                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                     <i class="ri-shut-down-line"></i>
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End Topbar -->
            <!-- Start Breadcrumbbar -->
            <div class="breadcrumbbar">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-8">
                        <div class="media">
                            <span class="breadcrumb-icon"><i class="ri-user-6-fill"></i></span>
                            <div class="media-body">
                                <h4 class="page-title">CRM</h4>
                                <div class="breadcrumb-list">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">CRM</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <div class="widgetbar">
                            <button class="btn btn-primary"><i class="ri-add-line align-middle mr-2"></i>ADD</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumbbar -->
            <!-- Start Contentbar -->
            <div class="contentbar">
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Leads</h5>
                            </div>
                            <div class="card-body pb-0">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h4>125</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <p class="mb-0"><i class="ri-arrow-right-up-line text-success align-middle font-18 mr-1"></i>5%</p>
                                        <p class="mb-0">This week</p>
                                    </div>
                                </div>
                                <div id="apex-line-chart1"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Projects</h5>
                            </div>
                            <div class="card-body pb-0">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h4>1,345</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <p class="mb-0"><i class="ri-arrow-right-down-line text-danger align-middle font-18 mr-1"></i>15%</p>
                                        <p class="mb-0">This week</p>
                                    </div>
                                </div>
                                <div id="apex-line-chart2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Clients</h5>
                            </div>
                            <div class="card-body pb-0">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h4>57</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <p class="mb-0"><i class="ri-arrow-right-up-line text-success align-middle font-18 mr-1"></i>45%</p>
                                        <p class="mb-0">This week</p>
                                    </div>
                                </div>
                                <div id="apex-line-chart3"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-header text-center">
                                <h5 class="card-title mb-0">Project Status</h5>
                            </div>
                            <div class="card-body p-0">
                                <div id="apex-circle-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-8">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Profit & Expenses</h5>
                            </div>
                            <div class="card-body py-0">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 col-xl-4">
                                        <h4 class="text-muted"><sup>$</sup>59876.00</h4>
                                        <p>Current Balance</p>
                                        <ul class="list-unstyled my-5">
                                            <li><i class="ri-checkbox-blank-circle-fill text-primary font-10 mr-2"></i>Amount Earned</li>
                                            <li><i class="ri-checkbox-blank-circle-fill text-success font-10 mr-2"></i>Amount Spent</li>
                                        </ul>
                                        <button type="button" class="btn btn-primary">Export<i class="ri-arrow-right-line align-middle ml-2"></i></button>
                                    </div>
                                    <div class="col-lg-12 col-xl-8">
                                        <div id="apex-horizontal-bar-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-6">
                        <div class="card m-b-30">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-6 col-lg-9">
                                        <h5 class="card-title mb-0">Latest Projects</h5>
                                    </div>
                                    <div class="col-6 col-lg-3">
                                        <select class="form-control font-12">
                                            <option value="class1" selected>Jan 20</option>
                                            <option value="class2">Feb 20</option>
                                            <option value="class3">Mar 20</option>
                                            <option value="class4">Apr 20</option>
                                            <option value="class5">May 20</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                   <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Project Name</th>
                                                <th scope="col">Company</th>
                                                <th scope="col">Country</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Native App Development</td>
                                                <td>New Ways</td>
                                                <td>Sweden</td>
                                                <td>$550</td>
                                                <td><span class="badge badge-primary">Confirmed</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>eCommerce Website</td>
                                                <td>Rocketics</td>
                                                <td>Norway</td>
                                                <td>$999</td>
                                                <td><span class="badge badge-success">Completed</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Digital Marketing</td>
                                                <td>My Recipes</td>
                                                <td>Germany</td>
                                                <td>$199</td>
                                                <td><span class="badge badge-warning">On Hold</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>SEO Services</td>
                                                <td>Creativelolo</td>
                                                <td>Canada</td>
                                                <td>$799</td>
                                                <td><span class="badge badge-light">Cancelled</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Logo Designing</td>
                                                <td>Unicar</td>
                                                <td>USA</td>
                                                <td>$99</td>
                                                <td><span class="badge badge-success">Completed</span></td>
                                            </tr>
                                        </tbody>
                                   </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-3">
                        <div class="card m-b-30">
                            <div class="card-header text-center">
                                <h5 class="card-title mb-0">Top Employees</h5>
                            </div>
                            <div class="card-body">
                                <div class="user-slider">
                                    <div class="user-slider-item">
                                        <div class="card-body text-center">
                                            <span class="action-icon badge badge-primary-inverse">JD</span>
                                            <h5>John Doe</h5>
                                            <p>Palo Alto, CA</p>
                                            <p class="mt-3 mb-0"><span class="badge badge-primary font-weight-normal font-14 py-1 px-2">Designer</span></p>
                                        </div>
                                    </div>
                                    <div class="user-slider-item">
                                        <div class="card-body text-center">
                                            <span class="action-icon badge badge-success-inverse">LS</span>
                                            <h5>Lauren Smith</h5>
                                            <p>New Parks, FL</p>
                                            <p class="mt-3 mb-0"><span class="badge badge-success font-weight-normal font-14 py-1 px-2">Developer</span></p>
                                        </div>
                                    </div>
                                    <div class="user-slider-item">
                                        <div class="card-body text-center">
                                            <span class="action-icon badge badge-secondary-inverse">MC</span>
                                            <h5>Maria Carey</h5>
                                            <p>Avenue Park, NY</p>
                                            <p class="mt-3 mb-0"><span class="badge badge-secondary font-weight-normal font-14 py-1 px-2">HR</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-3">
                        <div class="card bg-secondary-rgba text-center m-b-30">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Achievements</h5>
                            </div>
                            <div class="card-body">
                                <img src="assets/images/general/winner.svg" class="img-fluid img-winner" alt="achievements">
                                <h5 class="my-0">Worked more than 40 hours for 3 weeks.</h5>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
            <!-- End Contentbar -->
            <!-- Start Footerbar -->
            <div class="footerbar">
                <footer class="footer">
                    <p class="mb-0">© 2020 Minaati - All Rights Reserved.</p>
                </footer>
            </div>
            <!-- End Footerbar -->
        </div>
        <!-- End Rightbar -->
    </div>
    <!-- End Containerbar -->
    <!-- Start js -->
    <script src="{{ asset('admin/js/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/js/popper.min.js')}}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/modernizr.min.js')}}"></script>
    <script src="{{ asset('admin/js/detect.js')}}"></script>
    <script src="{{ asset('admin/js/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('admin/js/vertical-menu.js')}}"></script>
    <!-- Switchery js -->
    <script src="{{ asset('admin/plugins/switchery/switchery.min.js')}}"></script>
    <!-- Apex js -->
    <script src="{{ asset('admin/plugins/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/apexcharts/irregular-data-series.js')}}"></script>
    <!-- Slick js -->
    <script src="{{ asset('admin/plugins/slick/slick.min.js')}}"></script>
    <!-- Custom Dashboard js -->
    <script src="{{ asset('admin/js/custom/custom-dashboard.js')}}"></script>
    <!-- Core js -->
    <script src="{{ asset('admin/js/core.js')}}"></script>
    <!-- End js -->
</body>
</html>
