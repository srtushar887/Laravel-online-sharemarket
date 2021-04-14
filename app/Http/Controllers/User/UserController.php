<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_account_active;
use App\Models\user_plan;
use App\Models\user_withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $plans = user_plan::where('user_id',Auth::user()->id)->orderBy('id','desc')->take(5)->get();
        $user_withs = user_withdraw::where('user_id',Auth::user()->id)->orderBy('id','desc')->take(5)->get();
        $toal_with_count = user_withdraw::where('user_id',Auth::user()->id)->sum('amount');
        $my_plan_count = user_plan::where('user_id',Auth::user()->id)->count();
        return view('user.index',compact('plans','user_withs','toal_with_count','my_plan_count'));
    }


    public function profile()
    {
        return view('user.pages.profile');
    }

    public function profile_update(Request $request)
    {
        $profile_update = User::where('id',Auth::user()->id)->first();
        if($request->hasFile('profile_image')){
            @unlink($profile_update->profile_image);
            $image = $request->file('profile_image');
            $imageName = time().uniqid().'.'.'png';
            $directory = 'assets/admin/images/users/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $profile_update->profile_image = $imgUrl;
        }

        $profile_update->name = $request->name;
        $profile_update->email = $request->email;
        $profile_update->phone = $request->phone;
        $profile_update->save();

        return back()->with('success','Profile Successfully Updated');


    }


    public function change_password()
    {
        return view('user.pages.changePass');
    }


    public function change_password_update(Request $request) {


        if ($request->npas != $request->cpass) {
            return back()->with('alert','Password Not Match');
        }else{
            $user = User::where('id',Auth::user()->id)->first();
            $user->password = Hash::make($request->npas);
            $user->save();

            Auth::guard('web')->logout();
            Session::flush();
            \auth()->guard('web')->login($user);
            return redirect(route('user.change.password'))->with('success','Password Successfully Changed');

        }
    }



    public function referral_users()
    {
        $ref_users = User::where('have_ref_id',Auth::user()->my_ref_id)->paginate(10);
        return view('user.pages.referralUsers',compact('ref_users'));
    }


    public function account_active_submit(Request $request)
    {
        $new_account_actice = new user_account_active();
        $new_account_actice->user_id = Auth::user()->id;
        $new_account_actice->amount = $request->amount;
        $new_account_actice->address = $request->address;
        $new_account_actice->status = 1;
        $new_account_actice->save();


        $user = User::where('id',Auth::user()->id)->first();
        $user->is_acc_activate = 1;
        $user->save();


        return back()->with('success','Request has been submited . Please wait for admin approval');

    }


}
