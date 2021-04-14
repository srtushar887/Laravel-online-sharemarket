<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\plan;
use App\Models\User;
use App\Models\user_plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPlanController extends Controller
{
    public function choose_plan()
    {
        $plans = plan::where('status',1)->orderBy('id','desc')->paginate(15);
        return view('user.plans.choosePlan',compact('plans'));
    }


    public function choose_plan_save(Request $request)
    {


        $plan = plan::where('id',$request->choose_plan)->first();

        if ($request->plan_amount < $plan->plan_min_amount) {
            return back()->with('alert','Amount is less then plan amount');
        }elseif ($request->plan_amount > $plan->plan_max_amount){
            return back()->with('alert','Amount is bigger then plan amount');
        }elseif (Auth::user()->is_acc_activate == 0 || Auth::user()->is_acc_activate == 1 || Auth::user()->is_acc_activate == 3){
            return back()->with('alert','Your account is not activated');
        }else{
            $profile_am = ($request->plan_amount * $plan->profit) /100;

            $am = $request->plan_amount - $profile_am;
            $reuturn_am = $request->plan_amount + $profile_am;

            $new_plan = new user_plan();
            $new_plan->user_id = Auth::user()->id;
            $new_plan->plan_id = $plan->id;
            $new_plan->amount = $request->plan_amount;
            $new_plan->profit = $plan->profit;
            $new_plan->profit_amount = $profile_am;
            $new_plan->return_amount = $reuturn_am;
            $new_plan->address = $request->address;
            $new_plan->status = 0;
            $new_plan->claim_status_one = 0;
            $new_plan->plan_type = $plan->plan_type;
            $new_plan->save();

            return back()->with('success','Plan Successfully Added');
        }




    }


    public function my_plan()
    {

        $my_plans = user_plan::where('user_id',Auth::user()->id)
            ->Where('status',1)
            ->get();
        $date = Carbon::now();
        foreach ($my_plans as $mplan){

            if ($mplan->plan_type == 3) {

                if ($date >=  $mplan->first_date && $mplan->claim_status_one == 1) {
                    $mplan->claim_status_one = 2;
                    $mplan->save();
                }
                if ($date >=  $mplan->second_date && $mplan->claim_status_two == 1){
                    $mplan->claim_status_two = 2;
                    $mplan->save();
                }
                if ($date >=  $mplan->third_date && $mplan->claim_status_three == 1){
                    $mplan->claim_status_three = 2;
                    $mplan->save();
                }
                if ($date >= $mplan->return_date && $mplan->claim_status_four == 1) {
                    $mplan->claim_status_four = 2;
                    $mplan->save();
                }
            }else{
                if ($date >= $mplan->return_date) {
                    $mplan->status = 2;
                    $mplan->save();

                    $user = User::where('id',Auth::user()->id)->first();
                    $user->balance = $user->balance + $mplan->return_amount;
                    $user->save();
                }
            }


        }
        $plans = user_plan::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(15);
        return view('user.plans.myPlan',compact('plans'));
    }


    public function claim_first($plan_id,$amount,$type,$userplan_id)
    {
        $user_plan = user_plan::where('id',$userplan_id)->first();

        if ($type == 1) {

            $user_plan->claim_status_one = 3;
            $user_plan->save();

            $user =User::where('id',$user_plan->user_id)->first();
            $user->balance = $user->balance + $amount;
            $user->save();
            return back()->with('success','Q1 amount has been claimed');
        }elseif ($type == 2){
            $user_plan->claim_status_two = 3;
            $user_plan->save();

            $user =User::where('id',$user_plan->user_id)->first();
            $user->balance = $user->balance + $amount;
            $user->save();
            return back()->with('success','Q2 amount has been claimed');
        }elseif ($type == 3){
            $user_plan->claim_status_three = 3;
            $user_plan->save();


            $user =User::where('id',$user_plan->user_id)->first();
            $user->balance = $user->balance + $amount;
            $user->save();
            return back()->with('success','Q3 amount has been claimed');

        }elseif ($type == 4) {
            $user_plan->claim_status_four = 3;
            $user_plan->save();


            $user = User::where('id', $user_plan->user_id)->first();
            $user->balance = $user->balance + $amount;
            $user->save();
            return back()->with('success', 'Q3 amount has been claimed');
        }
        else{

            return back()->with('alert','Something went wrong');
        }



    }

}
