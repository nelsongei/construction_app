<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description"
          content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">

    <!-- theme meta -->
    <meta name="theme-name" content="sleek"/>

    <title>@yield('title','CMS System')</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
          rel="stylesheet"/>

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet"/>
    <script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('assets/admin/plugins/nprogress/nprogress.css')}}" rel="stylesheet"/>

    <!-- No Extra plugin used -->
    <link href='{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}' rel='stylesheet'>
    <link href='{{asset('assets/admin/plugins/daterangepicker/daterangepicker.css')}}' rel='stylesheet'>
    <link href='{{asset('assets/admin/plugins/toastr/toastr.min.css')}}' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{asset('assets/admin/css/sleek.css')}}"/>

    <!-- FAVICON -->
    <link href="{{asset('assets/admin/img/favicon.png')}}" rel="shortcut icon"/>

    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset('assets/admin/plugins/nprogress/nprogress.js')}}"></script>
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
<script>
    NProgress.configure({showSpinner: false});
    NProgress.start();
</script>

{{--<div id="toaster"></div>--}}

<!-- ====================================
——— WRAPPER
===================================== -->
<div class="wrapper">
    <!-- ====================================
      ——— LEFT SIDEBAR WITH OUT FOOTER
    ===================================== -->
    <aside class="left-sidebar bg-sidebar">
        <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
                <a href="{{url('home')}}" title="Sleek Dashboard">
                    <svg
                        class="brand-icon"
                        xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="xMidYMid"
                        width="30"
                        height="33"
                        viewBox="0 0 30 33">
                        <g fill="none" fill-rule="evenodd">
                            <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z"/>
                            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z"/>
                        </g>
                    </svg>
                </a>
            </div>

            <!-- begin sidebar scrollbar -->
            <div class="" data-simplebar style="height: 100%;">
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <li class="active expand">
                        <a class="sidenav-item-link" href="{{url('client_dashboard')}}">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="sidenav-item-link" href="{{url('client_dashboard/products')}}">
                            <i class="mdi mdi-menu"></i>
                            <span class="nav-text">Products</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="sidenav-item-link" href="{{url('client_dashboard/orders')}}">
                            <i class="mdi mdi-chart-areaspline"></i>
                            <span class="nav-text">Orders</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="sidenav-item-link" href="{{url('logout')}}">
                            <i class="mdi mdi-logout"></i>
                            <span class="nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- ====================================
  ——— PAGE WRAPPER
  ===================================== -->
    <div class="page-wrapper">

        <!-- Header -->
        <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg">
                <!-- Sidebar toggle button -->
                <button id="sidebar-toggler" class="sidebar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <!-- search form -->
                <div class="search-form d-none d-lg-inline-block">
                </div>

                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu custom-dropdown">
                            <button class="dropdown-toggle notify-toggler custom-dropdown-toggler">
                                <i class="mdi mdi-bell-outline"></i>
                            </button>

                            <div class="card card-default dropdown-notify dropdown-menu-right mb-0">
                                <div class="card-header card-header-border-bottom px-3">
                                    <h2>Notifications</h2>
                                </div>
                            </div>
                        </li>
                        <!-- User Account -->
                        <li class="dropdown user-menu">
                            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <img src="{{auth()->user()->profile}}" class="user-image" alt="User Image"/>
                                <span
                                    class="d-none d-lg-inline-block">{{auth()->user()->first_name.' '.auth()->user()->last_name}}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <!-- User image -->
                                <li class="dropdown-header">
                                    <img src="{{auth()->user()->profile}}" class="img-circle" alt="User Image"/>
                                    <div class="d-inline-block">
                                        {{auth()->user()->first_name.' '.auth()->user()->last_name}} <small
                                            class="pt-1">{{auth()->user()->email}}</small>
                                    </div>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="mdi mdi-account"></i> My Profile
                                    </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="{{url('/logout')}}"> <i class="mdi mdi-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @yield('content')
        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="copyright bg-white">
                <p>
                    Copyright &copy;
                    <span id="copy-year"></span>
                    <a class="text-primary" href="#" target="_blank">
                        CMS
                    </a>.
                </p>
            </div>
            <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;
            </script>
        </footer>

    </div> <!-- End Page Wrapper -->
</div> <!-- End Wrapper -->

<!-- Javascript -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src='{{asset('assets/admin/plugins/charts/Chart.min.js')}}'></script>
<script src='{{asset('assets/admin/js/chart.js')}}'></script>
<script src='{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}'></script>
<script src='{{asset('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}'></script>
<script src='{{asset('assets/admin/plugins/daterangepicker/moment.min.js')}}'></script>
<script src='{{asset('assets/admin/plugins/daterangepicker/daterangepicker.js')}}'></script>
<script src='{{asset('assets/admin/js/date-range.js')}}'></script>
<script src='{{asset('assets/admin/plugins/toastr/toastr.min.js')}}'></script>
<script src="{{asset('assets/admin/js/sleek.js')}}"></script>
</body>
</html>

