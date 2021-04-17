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
                                <h4 class="login-title text-center">REGISTER</h4>
                                <div class="row">
                                    @include('layouts.error')
                                    @if (Session::has('login_error'))
                                        <div class="alert alert-danger alert-dismissible">
                                            {{Session::get('login_error')}}
                                        </div>
                                    @endif
                                    @if (Session::has('email_error'))
                                        <div class="alert alert-danger alert-dismissible">
                                            {{Session::get('email_error')}}
                                        </div>
                                    @endif
                                    <form id="" method="post" action="{{route('user.referall.register.submit')}}" class="log-form">
                                        @csrf
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Ref ID</label>
                                            <input type="text" id="name" class="form-control" name="have_ref_id" value="{{$user->my_ref_id}}" readonly placeholder="Name" required="" data-error="Please enter your name">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Name</label>
                                            <input type="text" id="name" class="form-control" name="name" placeholder="Name" required="" data-error="Please enter your name">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Email</label>
                                            <input type="email" id="name" class="form-control" name="email" placeholder="Email" required="" data-error="Please enter your name">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Phone Number</label>
                                            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" name="phone" placeholder="Phone Number" required="" maxlength="10">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Password</label>
                                            <input type="password" id="msg_subject" class="form-control" name="password" placeholder="Password" required="" data-error="Please enter your message subject">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label>Confirm Password</label>
                                            <input type="password" id="msg_subject" class="form-control" name="confirm_password" placeholder="Confirm Password" required="" data-error="Please enter your message subject">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <div class="check-group flexbox">
                                                <label class="check-box">
                                                    <input type="checkbox" class="check-box-input" value="1" name="accept_temrs">
                                                    <span class="remember-text">Accept Terms & Conditions</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                            <button type="submit" id="" class="slide-btn login-btn">Register</button>
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
