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
                                <h4 class="login-title text-center">RESET PASSWORD</h4>
                                <div class="row">
                                    @include('layouts.error')
                                    @if (Session::has('email_success'))
                                        <div class="alert alert-danger alert-dismissible">
                                            {{Session::get('email_success')}}
                                        </div>
                                    @endif
                                    @if (Session::has('email_error'))
                                        <div class="alert alert-danger alert-dismissible">
                                            {{Session::get('email_error')}}
                                        </div>
                                    @endif
                                    <form id="" method="post" action="{{route('user.forgot.password.submit')}}" class="log-form">
                                        @csrf
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="email" name="email" id="name" class="form-control" placeholder="Email" required="" data-error="Please enter your name">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <button type="submit" id="" class="slide-btn login-btn">SUBMIT</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <div class="clear"></div>
                                            <div class="sign-icon">
                                                <div class="acc-not">Already have an account?  <a href="{{route('login')}}">Sign in</a></div>
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
