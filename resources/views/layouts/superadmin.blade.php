<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/nazox/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Mar 2021 10:48:52 GMT -->
<head>

    <meta charset="utf-8" />
    <title>{{$gn->site_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gn->icon)}}">

    <!-- jquery.vectormap css -->
    <link href="{{asset('assets/dashboard')}}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{asset('assets/dashboard')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/dashboard')}}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/dashboard')}}/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/dashboard')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/dashboard')}}/css/app.min.css"  rel="stylesheet" type="text/css" />

    @yield('css')
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box" style="background-color: #ffffff">
                    <a href="{{route('superadmin.dashboard')}}" class="logo logo-dark">
                        {{$gn->site_name}}
                    </a>

                    <a href="{{route('superadmin.dashboard')}}" class="logo logo-light" style="font-size: 25px">
                        <strong>{{$gn->site_name}}</strong>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>




            </div>

            <div class="d-flex">









                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (!empty(Auth::user()->profile_image) && file_exists(Auth::user()->profile_image))
                            <img class="rounded-circle header-profile-user" src="{{asset(Auth::user()->profile_image)}}"
                                 alt="Header Avatar">
                        @else
                            <img class="rounded-circle header-profile-user" src="https://www.computerhope.com/jargon/g/guest-user.jpg"
                                 alt="Header Avatar">
                        @endif


                        <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="{{route('superadmin.profile')}}"><i class="ri-user-line align-middle mr-1"></i> Profile</a>
                        <a class="dropdown-item" href="{{route('superadmin.change.password')}}"><i class="ri-lock-unlock-line align-middle mr-1"></i> Lock screen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{route('superadmin.logout')}}"><i class="ri-shut-down-line align-middle mr-1 text-danger"></i> Logout</a>
                    </div>
                </div>



            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{route('superadmin.dashboard')}}" class="waves-effect">
                            <i class="ri-dashboard-line"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('superadmin.general.settings')}}" class=" waves-effect">
                            <i class="ri-calendar-2-line"></i>
                            <span>General Settings</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('superadmin.plans')}}" class=" waves-effect">
                            <i class="ri-chat-1-line"></i>
                            <span>Plan</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('superadmin.user.plans')}}" class=" waves-effect">
                            <i class="ri-chat-1-line"></i>
                            <span>User Plans</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('superadmin.users')}}" class=" waves-effect">
                            <i class="ri-chat-1-line"></i>
                            <span>Users</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{route('superadmin.admins')}}" class=" waves-effect">
                            <i class="ri-chat-1-line"></i>
                            <span>Admins</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('superadmin.users.account.activation')}}" class=" waves-effect">
                            <i class="ri-chat-1-line"></i>
                            <span>Users Account Activation</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('superadmin.plans')}}" class=" waves-effect">
                            <i class="ri-chat-1-line"></i>
                            <span>Bought Share List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('superadmin.shared.share.list')}}" class=" waves-effect">
                            <i class="ri-chat-1-line"></i>
                            <span>User Share Plan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('superadmin.normal.share.list')}}" class=" waves-effect">
                            <i class="ri-chat-1-line"></i>
                            <span>User Normal Plan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('superadmin.scpecial.share.list')}}" class=" waves-effect">
                            <i class="ri-chat-1-line"></i>
                            <span>User Special Plan</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-store-2-line"></i>
                            <span>Withdraw Request</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('superadmin.withdraw.pending')}}">Pending</a></li>
                            <li><a href="{{route('superadmin.withdraw.confirmed')}}">Confirmed</a></li>
                            <li><a href="{{route('superadmin.withdraw.rejected')}}">Rejected</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-store-2-line"></i>
                            <span>Blog Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('superadmin.blog.category')}}">Blog Category</a></li>
                            <li><a href="{{route('superadmin.blog.list')}}">Blog</a></li>
                        </ul>
                    </li>



                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @yield('superadmin')
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <?php
                        $date = \Carbon\Carbon::now()->format('Y');
                        ?>
                        Copyright © {{$date}}. All rights reserved InvestorN Technologies
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Developed <i class="mdi mdi-heart text-danger"></i> by SR Tusher
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/dashboard')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/dashboard')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/dashboard')}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('assets/dashboard')}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('assets/dashboard')}}/libs/node-waves/waves.min.js"></script>


<!-- jquery.vectormap map -->
<script src="{{asset('assets/dashboard')}}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('assets/dashboard')}}/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

<!-- Required datatable js -->
<script src="{{asset('assets/dashboard')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/dashboard')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Responsive examples -->
<script src="{{asset('assets/dashboard')}}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets/dashboard')}}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>



<script src="{{asset('assets/dashboard')}}/js/app.js"></script>


@yield('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')
</body>

<!-- Mirrored from themesdesign.in/nazox/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Mar 2021 10:50:54 GMT -->
</html>
