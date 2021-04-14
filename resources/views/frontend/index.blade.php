@extends('layouts.frontend')
@section('front')
    <!-- Start Slider Area -->
    <div class="intro-area">
        <div class="bg-wrapper">
            <img src="{{asset('assets/frontend/')}}/img/background/slide-bg.png" alt="">
        </div>
        <div class="intro-content">
            <div class="slider-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slide-all-text">
                                <!-- layer 1 -->
                                <div class="layer-1 wow fadeInUp" data-wow-delay="0.3s">
                                    <h2 class="title2">The most prestigious Investments company in Kenya</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-2 wow fadeInUp" data-wow-delay="0.5s">
                                    <p>With Just your smart phone you can make a descent income without having any risk. Your Smart Phone is your Office at the comfort of your home</p>
                                    <ul>
                                        <li>Risk free Secure investments</li>
                                        <li>Cashless Transaction</li>
                                    </ul>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-3 wow fadeInUp" data-wow-delay="0.7s">
                                    <a href="{{route('login')}}" class="ready-btn" >Get Started</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->
    <!-- Start Count area -->
    <div class="counter-area fix bg-color area-padding-2">
        <div class="container">
            <!-- Start counter Area -->
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-fun">
                        <span class="counter-icon"><i class="flaticon-034-reward"></i></span>
                        <div class="fun-text">
                            <span class="counter">{{$total_users}}</span>
                            <h4>All Members</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-fun">
                        <span class="counter-icon"><i class="flaticon-016-graph"></i></span>
                        <div class="fun-text">
                            <span class="counter" style="font-size: 20px;">{{$gn->site_currency}}.{{$dep_count_am}}</span>
                            <h4>Total Deposit</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-fun">
                        <span class="counter-icon"><i class="flaticon-043-world"></i></span>
                        <div class="fun-text">
                            <span class="counter" style="font-size: 20px;">{{$gn->site_currency}}.{{$wit_count_am}}</span>
                            <h4>Total Withdraw</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Count area -->
    <!-- about-area start -->

    <!-- about-area end -->
    <!-- Start Invest area -->
    <div class="invest-area bg-color area-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Investments plan</h3>
                        <p>We are here for you, InvestorN Peers has the following Interest Packages that will help you grow financially at the comfort of your phone, your Phone is your office. InvestorN is Built to Last</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="pricing-content">
                    @foreach($plans as $plan)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="pri_table_list">
                            <div class="top-price-inner">
                                <h3>{{$plan->plan_name}}</h3>
                                <div class="rates">
                                    <span class="prices">{{$plan->profit}}%</span><span class="users">{{$plan->return_date}}Days</span>
                                </div>
                            </div>
                            <ol class="pricing-text">
                                <li class="check">Minimum Invest : {{$gn->site_currency}}.{{$plan->plan_min_amount}}</li>
                                <li class="check">Maximum Invest : {{$gn->site_currency}}.{{$plan->plan_max_amount}}</li>

                            </ol>
                            <div class="price-btn blue">
                                <a class="blue" href="{{route('user.choose.plan')}}">Deposit Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- End Invest area -->
    <!-- Start Support-service Area -->
    <div class="support-service-area bg-color2 area-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Why choose us</h3>
                        <p>We got you covered, you have a reason to smile, Bellow are some reasons for you to be here coz we are here for you. InvestorN is Built to Last</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="support-all">
                    <!-- Start About -->
                    <div class="col-md-4 col-sm-6 col-xs-12" style="height: 500px;">
                        <div class="support-services ">
                            <span class="top-icon"><i class="flaticon-023-management"></i></span>
                            <a class="support-images" href="#"><i class="flaticon-023-management"></i></a>
                            <div class="support-content">
                                <h4>Auto Trading</h4>
                                <p>You don’t have to know anything about forex trading or crypto, we manage the investment for you and get your profit once your package is due.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Start About -->
                    <div class="col-md-4 col-sm-6 col-xs-12" style="height: 500px;">
                        <div class="support-services ">
                            <span class="top-icon"><i class="flaticon-036-security"></i></span>
                            <a class="support-images" href="#"><i class="flaticon-036-security"></i></a>
                            <div class="support-content">
                                <h4>Secure investment</h4>
                                <p>With our system you are sure that your investment is fully secure and risk free. Let the experts trade on your behalf</p>
                            </div>
                        </div>
                    </div>
                    <!-- Start services -->
                    <div class="col-md-4 col-sm-6 col-xs-12" style="height: 500px;">
                        <div class="support-services ">
                            <span class="top-icon"><i class="flaticon-003-approve"></i></span>
                            <a class="support-images" href="#"><i class="flaticon-003-approve"></i></a>
                            <div class="support-content">
                                <h4>Registered company</h4>
                                <p>We are registered and incorporated as a business in Kenya. Click here to view our business certificate. This way you are sure that your investment is safe</p>
                            </div>
                        </div>
                    </div>
                    <!-- Start services -->
                    <div class="col-md-4 col-sm-6 col-xs-12" style="height: 500px;">
                        <div class="support-services">
                            <span class="top-icon"><i class="flaticon-042-wallet"></i></span>
                            <a class="support-images" href="#"><i class="flaticon-042-wallet"></i></a>
                            <div class="support-content">
                                <h4>Instant withdrawal</h4>
                                <p>Once your investment is due, you will receive your dues immediately after you hit the withdraw button</p>
                            </div>
                        </div>
                    </div>
                    <!-- Start services -->
                    <div class="col-md-4 col-sm-6 col-xs-12" style="height: 500px;">
                        <div class="support-services ">
                            <span class="top-icon"><i class="flaticon-032-report"></i></span>
                            <a class="support-images" href="#"><i class="flaticon-032-report"></i></a>
                            <div class="support-content">
                                <h4>Verified security</h4>
                                <p>You are safe from cyber security criminal who threaten many online businesses today.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Start services -->
                    <div class="col-md-4 col-sm-6 col-xs-12" style="height: 500px;">
                        <div class="support-services">
                            <span class="top-icon"><i class="flaticon-024-megaphone"></i></span>
                            <a class="support-images" href="#"><i class="flaticon-024-megaphone"></i></a>
                            <div class="support-content">
                                <h4>Live customer support</h4>
                                <p>You can chat with an admin using tawk.to installed on our landing page or utilize the chat feature within the dashboard once you are logged in. You can as well chat with your fellow investors</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Support-service Area -->
    <!--Start payment-history area -->
    <div class="payment-history-area bg-color fix area-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Deposite and withdrawals history</h3>
                        <p>Help agencies to define their new business objectives and then create professional software.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="deposite-content">
                        <div class="diposite-box">
                            <h3>Latest Deposit</h3>
                            <span><i class="flaticon-005-savings"></i></span>
                            <div class="deposite-table">
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                    @foreach($choose_plan as $chplan)
                                        <?php
                                        $user_cdata = \App\Models\User::where('id',$chplan->user_id)->first();
                                        ?>
                                    <tr>
                                        <td>
                                            @if (!empty($user_cdata->profile_image) && file_exists($user_cdata->profile_image))
                                                <img src="{{asset($user_cdata->profile_image)}}" alt="">
                                            @else
                                                <img src="{{asset('assets/frontend/')}}/img/icon/m.png" alt="">
                                            @endif
                                            {{$user_cdata->name}}
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($chplan->created_at)->format('Y-m-d')}}</td>
                                        <td>{{$gn->site_currency}}.{{$chplan->amount}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="deposite-content">
                        <div class="diposite-box">
                            <h3>Latest withdrawals</h3>
                            <span><i class="flaticon-042-wallet"></i></span>
                            <div class="deposite-table">
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                    @foreach($user_with as $userwit)
                                        <?php
                                            $user_wdata = \App\Models\User::where('id',$userwit->user_id)->first();
                                        ?>
                                    <tr>
                                        <td>
                                            @if (!empty($user_wdata->profile_image) && file_exists($user_wdata->profile_image))
                                                <img src="{{asset($user_wdata->profile_image)}}" alt="">
                                            @else
                                                <img src="{{asset('assets/frontend/')}}/img/icon/m.png" alt="">
                                            @endif
                                            {{$user_wdata->name}}
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($userwit->created_at)->format('Y-m-d')}}</td>
                                        <td>{{$gn->site_currency}}.{{$userwit->amount}}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End payment-history area -->
    <!-- Start Affiliate Area -->

    <!-- End Affiliate Area -->
    <!-- Start Overview Area -->
    <div class="overview-area bg-color fix area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="overview-content">
                        <div class="overview-images">
                            <img src="{{asset('assets/frontend/')}}/img/about/ab2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="overview-text">
                        <h3>Secure investments monthly instant award and Bonus </h3>
                        <p>Replacing a  maintains the amount of lines. When replacing a selection. help agencies to define their new business objectives and then create</p>
                        <ul>
                            <li><a href="#">Innovation idea latest business tecnology</a></li>
                            <li><a href="#">Digital content marketing online clients plateform</a></li>
                            <li><a href="#">Safe secure services for you online email account</a></li>
                        </ul>
                        <a class="overview-btn" href="#">Signup today</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Overview Area -->
    <!-- Start Blog area -->
    <div class="blog-area bg-color2 area-padding-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h3>Latest news</h3>
                        <p>Help agencies to define their new business objectives and then create professional software.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-grid home-blog">
                    <!-- Start single blog -->
                    @foreach($blogs as $blog)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="image-scale" href="{{route('blog.details',$blog->id)}}">
                                    @if (!empty($blog->image) && file_exists($blog->image))
                                        <img src="{{asset($blog->image)}}" style="height: 274px;width: 100%" alt="">
                                    @else
                                        <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 274px;width: 100%" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-category">
                                    <?php
                                        $bl_cat = \App\Models\blog_category::where('id',$blog->cat_id)->first();
                                    ?>
                                    <span>
                                          @if ($bl_cat)
                                            {{$bl_cat->category_name}}
                                        @endif
                                    </span>
                                </div>
                                <div class="blog-meta">
                                        <span class="admin-type">
                                            <i class="fa fa-user"></i>
                                            Admin
                                        </span>
                                    <span class="date-type">
                                           <i class="fa fa-calendar"></i>
                                             {{\Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')}}
                                        </span>
                                    <span class="comments-type">
                                         <?php
                                        $count_comm = \App\Models\blog_comment::where('blog_id',$blog->id)->count();
                                        ?>
                                            <i class="fa fa-comment-o"></i>
                                             {{$count_comm}}
                                        </span>
                                </div>
                                <div class="blog-title">
                                    <a href="{{route('blog.details',$blog->id)}}">
                                        <h4>  @if (strlen($blog->title) > 40)
                                                {{substr($blog->title,0,40)}}.........
                                            @else
                                                {!! $blog->title !!}
                                            @endif</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <!-- End single blog -->

                </div>
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Blog area -->
    <!-- Start Subscribe area -->

    <!-- End Subscribe area -->
@endsection
