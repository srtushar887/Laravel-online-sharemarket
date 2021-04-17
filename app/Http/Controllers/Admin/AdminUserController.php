<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $user_del->delete();
        return back()->with('success','User Account Successfully Deleted');

    }
}
