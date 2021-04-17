<?php

namespace App\Http\Controllers;

use App\Mail\UserAccountActivateMail;
use App\Mail\UserForgotPasswordMail;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomLoginController extends Controller
{

    public function register_from()
    {
        return view('auth.register');
    }

    public function user_register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|min:8',
        ],[
            'name.required' => 'Please enter your full name',
            'email.required' => 'Please enter your email address',
            'phone.required' => 'Please enter your phone number',
            'password.required' => 'Please enter your password',
        ]);

        $check_email = User::where('email',$request->email)->first();
        if ($check_email) {
            return back()->with('email_error','Sorry! Email already exists');
        }else{
            if ($request->password != $request->confirm_password) {
                return back()->with('pass_error','Sorry! Password not match. Please try again');
            }else{


                if ($request->accept_temrs != 1) {
                    return back()->with('reg_error','Please accept terms and conditions');
                }else{
                    $user = new User();
                    $user->balance = 0.00;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->phone = $request->phone;
                    $user->password = Hash::make($request->password);
                    $user->have_ref_id = null;
                    $user->is_account_veirified = 0;
                    $user->is_acc_activate = 0;
                    $user->save();

                    $code= Str::random(10).rand(000,999).$user->id.rand(00000,99999).Str::random(7).rand(000,999);
                    $user_ref= User::where('id',$user->id)->first();
                    $user_ref->my_ref_id = rand(00000,99999).$user->id.rand(000,999);
                    $user_ref->ver_code = $code;
                    $user_ref->save();


                    $check_url = route('user.account.verify',$code);
                    $to = $user->email;
                    $msg = [
                        'name' => $user->name,
                        'reseturl'=> $check_url
                    ];
                    Mail::to($to)->send(new UserAccountActivateMail($msg));

                    return redirect(route('login'))->with('acc_create_success','Account successfully created. We have sent you an email to activate your account. Please verify your email address to continue');
                }



            }
        }
    }



    public function user_referral_register($refid)
    {
        $user = User::where('my_ref_id',$refid)->first();
        if ($user) {
            return view('auth.userReferallRegister',compact('user'));
        }else{
            return redirect(route('login'))->with('ref_error','Sorry! That referral link is not valid');
        }
    }


    public function user_referral_register_save(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required|min:8',
        ],[
            'name.required' => 'Please enter your full name',
            'email.required' => 'Please enter your email address',
            'phone.required' => 'Please enter your phone number',
            'password.required' => 'Please enter your password',
        ]);


        $check_email = User::where('email',$request->email)->first();
        if ($check_email) {
            return back()->with('email_error','Sorry! Email already exists');
        }else{
            if ($request->password != $request->confirm_password) {
                return back()->with('pass_error','Sorry! Password not match. Please try again');
            }else{


                if ($request->accept_temrs != 1) {
                    return back()->with('reg_error','Please accept terms and conditions');
                }else{
                    $user = new User();
                    $user->balance = 0.00;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->phone = $request->phone;
                    $user->password = Hash::make($request->password);
                    $user->have_ref_id = $request->have_ref_id;
                    $user->is_account_veirified = 0;
                    $user->save();

                    $code= Str::random(10).rand(000,999).$user->id.rand(00000,99999).Str::random(7).rand(000,999);
                    $user_ref= User::where('id',$user->id)->first();
                    $user_ref->my_ref_id = rand(00000,99999).$user->id.rand(000,999);
                    $user_ref->ver_code = $code;
                    $user_ref->save();


                    $check_url = route('user.account.verify',$code);
                    $to = $user->email;
                    $msg = [
                        'name' => $user->name,
                        'reseturl'=> $check_url
                    ];
                    Mail::to($to)->send(new UserAccountActivateMail($msg));

                    return redirect(route('login'))->with('acc_create_success','Account successfully created. We have sent you an email to activate your account. Please verify your email address to continue');
                }


            }
        }
    }



    public function verify_account($code)
    {
        $user = User::where('ver_code',$code)->first();

        if ($user) {
            $user->is_account_veirified = 1;
            $user->ver_code = null;
            $user->save();
            return redirect(route('login'))->with('acoount_active','Your account successfully activated. Please login');
        }else{
            return redirect(route('login'))->with('login_error','Sorry! Your account is not activated, kindly verify your account to continue');
        }

    }




    public function login_from()
    {
        return view('auth.login');
    }

    public function user_login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect(route('dashboard'));
        }else{
            return redirect()->back()->with('login_error','Sorry! Invalid Credentials . Please try again.');
        }




    }


    public function forgot_password()
    {
        return view('auth.userForgotPassword');
    }

    public function forgot_password_save(Request $request)
    {
        $check_email = User::where('email',$request->email)->first();
        if ($check_email) {

            $code= Str::random(10).rand(000,999).$check_email->id.rand(00000,99999).Str::random(7).rand(000,999);
            $user = User::where('id',$check_email->id)->first();
            $user->ver_code= $code;
            $user->save();

            $check_url = route('user.forgot.password.verify',$code);
            $to = $check_email->email;
            $msg = [
                'name' => $user->name,
                'reseturl'=> $check_url
            ];
            Mail::to($to)->send(new UserForgotPasswordMail($msg));
            return back()->with('email_success','We have send a email . Please check your email and reset your password');


        }else{
            return back()->with('email_error','Sorry! Email not exist in our system');
        }
    }

    public function forgot_password_verify($code)
    {

        $check_code = User::where('ver_code',$code)->first();
        if ($check_code) {
            return redirect(route('user.forgot.password.chnage',$code));
        }else{
            return redirect(route('login'))->with('code_error','Sorry! That Verify url is not exist');
        }


    }


    public function forgot_password_change($code)
    {
        $user= User::where('ver_code',$code)->first();
        return view('auth.userForgotPasswordChange',compact('user'));
    }

    public function forgot_password_change_save(Request $request)
    {

        $this->validate($request,[
           'password'=>'required|min:8',
           'confirm_password'=>'required|min:8',
        ]);

        $npass= $request->password;
        $cpass= $request->confirm_password;

        if ($npass != $cpass) {
            return back()->with('pass_error','Sorry! Password not match');
        }else{
            $user= User::where('ver_code',$request->code)->first();
            $user->password= Hash::make($npass);
            $user->ver_code = null;
            $user->save();
            return redirect(route('login'))->with('pass_chnage_success','Password has been successfully changed. Please login');
        }

    }





}
