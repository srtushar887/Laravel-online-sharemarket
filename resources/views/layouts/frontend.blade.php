<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from rockstheme.com/rocks/live-resthyip/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Mar 2021 09:06:04 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$gn->site_name}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset($gn->icon)}}">

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/bootstrap.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/owl.transitions.css">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/animate.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/meanmenu.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/flaticon.css">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/magnific.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/responsive.css">

    <!-- modernizr css -->
    <script src="{{asset('assets/frontend/')}}/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="preloader"></div>
<header class="header-one">
    <!-- Start top bar -->
    <div class="topbar-area">
        <div class="container">
            <div class="row">
                <div class=" col-md-8 col-sm-8 col-xs-12">
                    <div class="topbar-left">
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope"></i> {{$gn->site_email}}</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i> {{$gn->site_phone}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End top bar -->
    <!-- header-area start -->
    <div id="sticker" class="header-area hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <!-- logo start -->
                        <div class="col-md-3 col-sm-3">
                            <div class="logo">
                                <!-- Brand -->
                                <a class="navbar-brand page-scroll" href="{{route('front')}}" style="color: white;margin-top: 12px;">
                                   <h3> <strong>{{$gn->site_name}}</strong></h3>
                                </a>
                            </div>
                            <!-- logo end -->
                        </div>
                        <div class="col-md-9 col-sm-9">
                            <div class="header-right-link">
                                <!-- search option end -->
                                <a class="s-menu" href="{{route('login')}}">Login</a>
                            </div>
                            <!-- mainmenu start -->
                            <nav class="navbar navbar-default">
                                <div class="collapse navbar-collapse" id="navbar-example">
                                    <div class="main-menu">
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="{{route('front')}}">Home</a></li>
                                            <li><a href="{{route('about.us')}}">About us</a></li>
                                            <li><a href="{{route('how.it.works')}}">How It Works</a></li>
                                            <li><a href="{{route('team')}}">Team</a></li>
                                            <li><a href="{{route('blog')}}">Blog</a></li>
                                            <li><a href="{{route('contact.us')}}">contacts</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!-- mainmenu end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($gn->is_maintanance_message_show ==1)
    <div id="sticker" class="header-area hidden-xs" style="background-color: #f2dede">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 text-center">
                    <i class="fas fa-exclamation-circle"></i>  <strong style="color: black">{{$gn->maintanance_message}}</strong>
                </div>
            </div>
        </div>
    </div>
@endif




    <!-- header-area end -->
    <!-- mobile-menu-area start -->
    <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mobile-menu">
                        <div class="logo">
                            <a class="navbar-brand page-scroll" href="{{route('front')}}" style="color: white;">
                                <h3> <strong style="font-size: 17px">{{$gn->site_name}}</strong></h3>
                            </a>
                        </div>
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{route('front')}}">Home</a></li>
                                <li><a href="{{route('about.us')}}">About us</a></li>
                                <li><a href="{{route('how.it.works')}}">How It Works</a></li>
                                <li><a href="{{route('team')}}">Team</a></li>
                                <li><a href="{{route('blog')}}">Blog</a></li>
                                <li><a href="{{route('contact.us')}}">contacts</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- mobile-menu-area end -->
</header>
<!-- header end -->
@yield('front')
<!-- Start Footer Area -->
<footer class="footer1">
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="footer-content logo-footer">
                        <div class="footer-head">
                            <div class="footer-logo">
                                <a class="footer-black-logo" href="#" style="font-size: 31px;color: whitesmoke">
                                    <strong>{{$gn->site_name}}</strong>
                                </a>
                            </div>
                            <p>
                                Are you looking for a secure online investment platform? Would you want to use your phone as your office and earn descent Income at the comfort of your home? Relax... InvestorN got you covered. Join us today. Risk Free Investments guaranteed..... InvestorN Build to last
                            </p>

                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-4 col-sm-3 col-xs-12">
                    <div class="footer-content">
                        <div class="footer-head">
                            <h4>Usefull Links</h4>
                            <ul class="footer-list">
                                <li><a href="{{route('front')}}">Home</a></li>
                                <li><a href="{{route('about.us')}}">About Us </a></li>
                                <li><a href="{{route('how.it.works')}}">How It Works</a></li>
                                <li><a href="{{route('team')}}">Team</a></li>
                                <li><a href="{{route('blog')}}">Blog</a></li>
                                <li><a href="{{route('contact.us')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end single footer -->
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="footer-content last-content">
                        <div class="footer-head">
                            <h4>Information</h4>
                            <div class="footer-contacts">
                                <p><span>Tel :</span> {{$gn->site_phone}}</p>
                                <p><span>Email :</span> {{$gn->site_email}}</p>
                                <p><span>Address :</span> {!! $gn->site_address !!}</p>
                            </div>
                            <div class="footer-icons">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/InvestorNPeers/" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/InvestorNke" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="copyright">
                        <p>
                            Copyright © 2020
                            <a href="#">{{$gn->site_name}}</a> All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer area -->

<!-- all js here -->




<!-- jquery latest version -->
<script src="{{asset('assets/frontend/')}}/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/frontend/')}}/js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="{{asset('assets/frontend/')}}/js/owl.carousel.min.js"></script>
<!-- magnific js -->
<script src="{{asset('assets/frontend/')}}/js/magnific.min.js"></script>
<!-- wow js -->
<script src="{{asset('assets/frontend/')}}/js/wow.min.js"></script>
<!-- meanmenu js -->
<script src="{{asset('assets/frontend/')}}/js/jquery.meanmenu.js"></script>
<!-- Form validator js -->
<script src="{{asset('assets/frontend/')}}/js/form-validator.min.js"></script>
<!-- plugins js -->
<script src="{{asset('assets/frontend/')}}/js/plugins.js"></script>
<!-- main js -->
<script src="{{asset('assets/frontend/')}}/js/main.js"></script>



<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5fd4b0e8a8a254155ab2a1dd/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

</body>

<!-- Mirrored from rockstheme.com/rocks/live-resthyip/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Mar 2021 09:07:35 GMT -->
</html>
