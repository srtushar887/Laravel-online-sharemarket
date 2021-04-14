@extends('layouts.frontend')
@section('front')
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline">
                            <h2>About Us</h2>
                        </div>
                        <ul>
                            <li class="home-bread">Home</li>
                            <li>About us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-area bg-color2 area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="about-image">
                        <img src="{{asset('assets/frontend/')}}/img/about/ab.jpg" alt="">
                        <div class="video-content">
                            <a href="https://www.youtube.com/watch?v=O33uuBh6nXA" class="video-play vid-zone">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- column end -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="about-content">
                        <h3>Who are we?</h3>
                        <p class="hidden-sm">
                            nvestorN Technologies (blend of peer to peer and online investment) is an online platform that allows members to make short-term profitable investments at the Comfort of their Smart devices.
                            Our system works in a way that Members invest online by selecting the package of their choice and earn a descent profit after the maturity of their plan
                            Payment
                            <br>
                            We accept payment through MPESA PAYBILL to INVESTORN PEERS1. Our Investment is set to a minimum of Ksh 1000 and a maximum of Ksh 30,000. Once you select the package you wish to buy from, go to: SIM TOOLKIT >MPESA >LIPANAMPESA >PAYBILL >BUSINES NO: 4047793 ACCOUNT #: Customer Number >Your PIN

                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
