<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\general_setting;
use App\Models\User;
use App\Models\user_plan;
use App\Models\user_withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $total_user = User::count();
        $total_withdraw = user_withdraw::where('status',2)->sum('amount');
        $user_invest_plan = user_plan::count();
        $latest_users = User::orderBy('id','desc')->take(5)->get();
        return view('admin.index',compact('total_user','total_withdraw','user_invest_plan','latest_users'));
    }

    public function general_setting()
    {
        $gen = general_setting::first();
        return view('admin.pages.generalSettings',compact('gen'));
    }


    public function general_setting_save(Request $request)
    {
        $gen = general_setting::first();
        if($request->hasFile('logo')){
            @unlink($gen->logo);
            $image = $request->file('logo');
            $imageName = time().uniqid().'.'.'png';
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen->icon);
            $image = $request->file('icon');
            $imageName = time().uniqid().'.'.'png';
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->icon = $imgUrl;
        }

        if($request->hasFile('login_page_image')){
            @unlink($gen->login_page_image);
            $image = $request->file('login_page_image');
            $imageName = time().uniqid().'.'.'png';
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->login_page_image = $imgUrl;
        }


        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->site_phone = $request->site_phone;
        $gen->site_currency = $request->site_currency;
        $gen->site_address = $request->site_address;
        $gen->save();

        return back()->with('success','General Settings Successfully Updated');



    }


    public function profile()
    {
        return view('admin.pages.profile');
    }

    public function profile_update(Request $request)
    {
        $profile_update = Admin::where('id',Auth::user()->id)->first();
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
        return view('admin.pages.changePass');
    }

    public function change_password_save(Request $request)
    {
        if ($request->npas != $request->cpass) {
            return back()->with('alert','Password Not Match');
        }else {
            $user = Admin::where('id', Auth::user()->id)->first();
            $user->password = Hash::make($request->npas);
            $user->save();
        }
        return back()->with('success','Password Successfully Changed');
    }
}
