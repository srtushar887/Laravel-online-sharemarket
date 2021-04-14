<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user_buy_share;
use App\Models\user_plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserShareController extends Controller
{
    public function buy()
    {
        $plans = user_plan::where('user_id','!=',Auth::user()->id)
            ->where('plan_type',1)
            ->Where('status',2)
            ->orderBy('id','desc')->paginate(15);
        return view('user.share.buy',compact('plans'));
    }


    public function buy_share_save(Request $request)
    {


        $plan = user_plan::where('id',$request->choose_plan)->first();

        $new_share = new user_buy_share();
        $new_share->user_id = Auth::user()->id;
        $new_share->seller_id = $plan->user_id;
        $new_share->plan_id = $plan->plan_id;
        $new_share->amount = $plan->amount;
        $new_share->status = 1;
        $new_share->save();

        return back()->with('success','You have been successfully paired');

    }


    public function bought_share()
    {
        $shares = user_buy_share::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(15);
        return view('user.share.boughtShare',compact('shares'));
    }


    public function sell()
    {
        $sell = user_buy_share::where('seller_id',Auth::user()->id)->orderBy('id','desc')->paginate(15);
        return view('user.share.sell',compact('sell'));
    }

    public function sell_confirm($id)
    {
        $sell_confirm = user_buy_share::where('id',$id)->first();
        $sell_confirm->status = 2;
        $sell_confirm->save();
        return back()->with('success','Sell Successfully Confirmed');

    }


    public function sell_remove($id)
    {
        $sell_remove = user_buy_share::where('id',$id)->first();
        $sell_remove->status = 3;
        $sell_remove->save();
        return back()->with('success','Sell Successfully Removed');
    }


    public function sell_report($id)
    {
        $sell_report = user_buy_share::where('id',$id)->first();
        $sell_report->status = 4;
        $sell_report->save();
        return back()->with('success','Sell Successfully Reported');
    }


    public function sell_repair($id)
    {
        $sell_repair = user_buy_share::where('id',$id)->first();
        $sell_repair->status = 5;
        $sell_repair->save();
        return back()->with('success','Sell Successfully Re-Pair');
    }
}
