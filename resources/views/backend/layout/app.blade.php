<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title',env('APP_NAME')) </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('public/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{asset('public/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
    {{-- from Tauhid bhai --}}
    <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>

	@stack('styles')


</head>

<body>
     <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{asset('public/images/logo.png')}}" alt="">
                <img class="logo-compact" src="{{asset('public/images/logo-text.png')}}" alt="">
                <img class="brand-title" src="{{asset('public/images/logo-text.png')}}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{route('logOut')}}" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li>
                        <a href="{{route('dashboard')}}" aria-expanded="false">
                            <i class="icon icon-single-04"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('land.index')}}" aria-expanded="false">
                            <i class="icon icon-single-04"></i>
                            <span class="nav-text">Land</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-chart-bar-33"></i>
                            <span class="nav-text">Project</span>
                        </a>
                        <ul aria-expanded="false">
                            
                            <li><a href="{{route('project.index')}}">Project</a></li>
                            <li><a href="{{route('floor.index')}}">Floor</a> </li>
                            <li><a href="{{route('pm.index')}}">Floor Material</a></li>
                            <li><a href="{{route('flat.index')}}">Flat</a></li>
                        </ul>
                    </li>
                    <!-- <li class="nav-label">Apps</li> -->
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-chart-bar-33"></i>
                            <span class="nav-text">Materials</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('material.index')}}">Materials</a></li>
                            <li><a href="{{route('damage.index')}}">Material Damage</a></li>
                            <li><a href="{{route('asset.index')}}">Assets</a></li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-settings"></i>
                            <span class="nav-text">Client</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('client.index')}}">Client</a></li>
                            <li><a href="{{route('payment.index')}}">Payment</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-chart-bar-33"></i>
                            <span class="nav-text">Purchase</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('purchase.index')}}">Purchase Materials</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-settings"></i>
                            <span class="nav-text">Settings</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('user.index')}}">User</a></li>
                            <li><a href="{{route('role.index')}}">Role</a></li>
                            <li><a href="{{route('employee.index')}}">Employees</a></li>
                        </ul>
                    </li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>@yield('title')</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">@yield('page')</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('public/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('public/js/quixnav-init.js')}}"></script>
    <script src="{{asset('public/js/custom.min.js')}}"></script>


    <!-- Vectormap -->
    <script src="{{asset('public/vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('public/vendor/morris/morris.min.js')}}"></script>


    <script src="{{asset('public/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('public/vendor/chart.js/Chart.bundle.min.js')}}"></script>

    <script src="{{asset('public/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

    <!--  flot-chart js -->
    <script src="{{asset('public/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('public/vendor/flot/jquery.flot.resize.js')}}"></script>

    <!-- Owl Carousel -->
    <script src="{{asset('public/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

    <!-- Counter Up -->
    <script src="{{asset('public/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('public/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('public/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>


    <script src="{{asset('public/js/dashboard/dashboard-1.js')}}"></script>
	@stack('scripts')
	<!-- Init JavaScript -->
	<script src="{{asset('public/dist/js/init.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
	{!! Toastr::message() !!}

</body>

</html>
