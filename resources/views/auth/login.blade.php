@extends('layouts.frontend')
@section('front')
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="login-area area-padding fix">
        <div class="login-overlay"></div>
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12">
                            <div class="login-form">
                                <h4 class="login-title text-center">LOGIN</h4>
                                <div class="row">
                                    @include('layouts.error')
                                    @if (Session::has('login_error'))
                                        <div class="alert alert-danger alert-dismissible">
                                            {{Session::get('login_error')}}
                                        </div>
                                    @endif
                                    @if (Session::has('code_error'))
                                        <div class="alert alert-danger alert-dismissible">
                                            {{Session::get('code_error')}}
                                        </div>
                                    @endif
                                    @if (Session::has('pass_chnage_success'))
                                        <div class="alert alert-danger alert-dismissible">
                                            {{Session::get('pass_chnage_success')}}
                                        </div>
                                    @endif
                                    @if (Session::has('ref_error'))
                                        <div class="alert alert-danger alert-dismissible">
                                            {{Session::get('ref_error')}}
                                        </div>
                                    @endif
                                    @if (Session::has('acoount_active'))
                                        <div class="alert alert-danger alert-dismissible">
                                            {{Session::get('acoount_active')}}
                                        </div>
                                    @endif
                                    @if (Session::has('acc_create_success'))
                                        <div class="alert alert-danger alert-dismissible">
                                            {{Session::get('acc_create_success')}}
                                        </div>
                                    @endif
                                    <form id="" method="post" action="{{route('user.login.submit')}}" class="log-form">
                                        @csrf
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="email" name="email" id="name" class="form-control" placeholder="Email" required="" data-error="Please enter your name">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="password" name="password" id="msg_subject" class="form-control" placeholder="Password" required="" data-error="Please enter your message subject">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <div class="check-group flexbox">
                                                <a class="text-muted" href="{{route('user.forgot.password')}}">Forgot password?</a>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <button type="submit" id="" class="slide-btn login-btn">Login</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <div class="clear"></div>
                                            <div class="sign-icon">
                                                <div class="acc-not">Don't have an account?  <a href="{{route('register')}}">Sign up</a></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
