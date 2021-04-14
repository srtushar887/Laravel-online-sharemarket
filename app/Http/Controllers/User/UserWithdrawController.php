<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserWithdrawController extends Controller
{
    public function withdraw()
    {
        $user_withs = user_withdraw::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('user.withdraw.withdrawList',compact('user_withs'));
    }

    public function withdraw_save(Request $request)
    {


        if ($request->amount == 0.00) {
            return back()->with('alert','Sorry! Insufficient Balance');
        }elseif ($request->amount > Auth::user()->balance){
            return back()->with('alert','Sorry! Insufficient Balance');
        }else{

            $amount = ($request->amount * 5) / 100;
            $total_am = $request->amount - $amount;

            $new_with = new user_withdraw();
            $new_with->with_id = Str::random(5).Auth::user()->id.rand(000,999).Str::random(3);
            $new_with->user_id = Auth::user()->id;
            $new_with->total_amount = $request->amount;
            $new_with->amount = $total_am;
            $new_with->address = $request->address;
            $new_with->status = 1;
            $new_with->save();


            $user = User::where('id',Auth::user()->id)->first();
            $user->balance = $user->balance - $request->amount;
            $user->save();




            return back()->with('success','Withdraw Request Successfully Send');
        }



    }
}
