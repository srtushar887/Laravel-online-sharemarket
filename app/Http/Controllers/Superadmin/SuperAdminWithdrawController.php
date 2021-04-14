<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_withdraw;
use Illuminate\Http\Request;

class SuperAdminWithdrawController extends Controller
{
    public function withdraw_pending()
    {
        $user_withs = user_withdraw::where('status',1)->orderBy('id','desc')->paginate(10);
        return view('superadmin.withdraw.pendingWithdraw',compact('user_withs'));
    }

    public function withdraw_confirmed()
    {
        $user_withs = user_withdraw::where('status',2)->orderBy('id','desc')->paginate(10);
        return view('superadmin.withdraw.confirmWithdraw',compact('user_withs'));
    }

    public function withdraw_rejected()
    {
        $user_withs = user_withdraw::where('status',3)->orderBy('id','desc')->paginate(10);
        return view('superadmin.withdraw.rejectedWithdraw',compact('user_withs'));
    }




    public function withdraw_status_save(Request $request)
    {

        if ($request->status == 2) {
            $with_status = user_withdraw::where('id',$request->with_id)->first();
            $with_status->status = $request->status;
            $with_status->save();


        }else{
            $with_status = user_withdraw::where('id',$request->with_id)->first();
            $with_status->status = $request->status;
            $with_status->save();

            $user = User::where('id',$with_status->user_id)->first();
            $user->balance = $user->balance + $with_status->total_amount;
            $user->save();

        }


        return back()->with('success','Withdraw Request Successfully Updated');

    }


    public function withdraw_delete(Request $request)
    {
        $with_status = user_withdraw::where('id',$request->with_del_id)->first();
        $with_status->delete();

        return back()->with('success','Withdraw Request Successfully Deleted');
    }
}
