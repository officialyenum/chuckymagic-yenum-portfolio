@section('title')
    Dashboard
@endsection
@extends('layouts.admin')
@section('styles')
    <!-- Apex css -->
    <link href="{{ asset('public/assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
    <!-- Slick css -->
    <link href="{{ asset('public/assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('rightbar-content')
    <!-- Start Contentbar -->
        <div class="contentbar">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Views</h5>
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
                            <h5 class="card-title mb-0">Comments</h5>
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
                            <h5 class="card-title mb-0">Subscribers</h5>
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
@endsection
@section('scripts')
    <!-- Apex js -->
    <script src="{{ asset('public/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Slick js -->
    <script src="{{ asset('public/assets/plugins/slick/slick.min.js') }}"></script>
    <!-- Custom Dashboard js -->
    <script src="{{ asset('public/assets/js/custom/custom-dashboard.js') }}"></script>
@endsection
