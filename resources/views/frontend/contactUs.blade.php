@extends('layouts.frontend')
@section('front')
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline">
                            <h2>Contact Us</h2>
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

    <div class="contact-page bg-color area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="contact-details">
                        <div class="contact-icon">
                            <div class="single-contact">
                                <h5>Our Office</h5>
                                <a href="#"><i class="fa fa-phone"></i><span>{{$gn->site_phone}}</span></a>
                                <a href="#"><i class="fa fa-envelope"></i><span>{{$gn->site_email}}</span></a>
                                <a href="#"><i class="fa fa-map"></i><span>{!! $gn->site_address !!}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End contact icon -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="contact-form">
                        <div class="row">
                            <form id="" method="post" action="{{route('contact.us.send.data')}}" class="contact-form">
                                @csrf
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required="" data-error="Please enter your name">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" class="email form-control" name="email" id="email" placeholder="Email" required="" data-error="Please enter your email">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" id="msg_subject" class="form-control" name="subject" placeholder="Subject" required="" data-error="Please enter your message subject">
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <textarea id="message" rows="7" placeholder="Massage" name="message" class="form-control" required="" data-error="Write your message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" id="submit" class="contact-btn">Submit</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End contact Form -->
            </div>
        </div>
    </div>
@endsection
