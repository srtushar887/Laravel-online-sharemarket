<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_account_active;
use App\Models\user_buy_share;
use App\Models\user_plan;
use App\Models\user_withdraw;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function users()
    {
        $users = User::orderBy('id','desc')->paginate(15);
        return view('admin.users.userList',compact('users'));
    }

    public function user_edit($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.users.userEdit',compact('user'));
    }

    public function user_update(Request $request)
    {
        $user = User::where('id',$request->edit_user)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->is_account_veirified = $request->is_acc_activate;
        $user->save();

        return back()->with('success','User Account Successfully Updated');

    }


    public function user_delete(Request $request){
        $user_del = User::where('id',$request->user_delete)->first();

        user_plan::where('user_id',$user_del->id)->delete();
        user_buy_share::where('user_id',$user_del->id)->delete();
        user_withdraw::where('user_id',$user_del->id)->delete();
        user_account_active::where('user_id',$user_del->id)->delete();


        $user_del->delete();
        return back()->with('success','User Account Successfully Deleted');

    }


    public function user_account_activation()
    {
        $users_acc = user_account_active::orderBy('id','desc')->paginate(15);
        return view('admin.users.userAccountActivation',compact('users_acc'));
    }

    public function user_account_activation_save(Request $request)
    {
        $status = $request->status;
        if ($status == 0) {
            return back()->with('alert','Please select status');
        }elseif ($status == 2){
            $user_ac = user_account_active::where('id',$request->user_acc_id)->first();
            $user_ac->status = $request->status;
            $user_ac->save();


            $user = User::where('id',$user_ac->user_id)->first();
            $user->is_acc_activate = 2;
            $user->save();


            $upline_user = User::where('my_ref_id',$user->have_ref_id)->first();
            if ($upline_user) {
                $am = ($user_ac->amount * 50) / 100;
                $upline_user->balance = $upline_user->balance + $am;
                $upline_user->save();
            }

            return back()->with('success','Account Successfully Updated');
        }elseif ($status == 3){
            $user_ac = user_account_active::where('id',$request->user_acc_id)->first();
            $user_ac->status = $request->status;
            $user_ac->save();

            $user = User::where('id',$user_ac->user_id)->first();
            $user->is_acc_activate = 3;
            $user->save();


            return back()->with('success','Account Successfully Updated');
        }else{
            return back()->with('alert','Something went wrong');
        }
    }


}
