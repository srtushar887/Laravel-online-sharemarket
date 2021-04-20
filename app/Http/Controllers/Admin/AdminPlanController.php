<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\plan;
use App\Models\user_plan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPlanController extends Controller
{
    public function plans()
    {
        $plans = plan::orderBy('id','desc')->paginate(15);
        return view('admin.plans.planList',compact('plans'));
    }

    public function plans_save(Request $request)
    {
        $new_plan = new plan();
        $new_plan->plan_name = $request->plan_name;
        $new_plan->plan_amount = $request->plan_amount;
        $new_plan->return_date = $request->return_date;
        $new_plan->profit = $request->profit;
        $new_plan->plan_type = $request->plan_type;
        $new_plan->status = $request->status;
        $new_plan->save();
        return back()->with('success','Plan Successfully Created');

    }

    public function plans_update(Request $request)
    {
        $plan_update = plan::where('id',$request->plan_edit)->first();
        $plan_update->plan_name = $request->plan_name;
        $plan_update->plan_amount = $request->plan_amount;
        $plan_update->return_date = $request->return_date;
        $plan_update->profit = $request->profit;
        $plan_update->status = $request->status;
        $plan_update->plan_type = $request->plan_type;
        $plan_update->save();
        return back()->with('success','Plan Successfully Updated');
    }

    public function plans_delete(Request $request)
    {
        $plan_delete = plan::where('id',$request->plan_delete)->first();
        $plan_delete->delete();
        return back()->with('success','Plan Successfully Deleted');
    }


    public function user_plans()
    {
        $user_plans = user_plan::orderBy('id','desc')->paginate(15);
        return view('admin.plans.userPlanList',compact('user_plans'));
    }


    public function user_plans_update(Request $request)
    {
        $user_plan = user_plan::where('id',$request->user_plan_update)->first();
        $user_plan->status = $request->status;
        $user_plan->save();

        $plan = plan::where('id',$user_plan->plan_id)->first();

        $plan_type_update = user_plan::where('id',$user_plan->id)->first();
        if ($request->status == 1) {
            if ($plan_type_update->plan_type == 3) {
                $plan_type_update->first_date = Carbon::now('Africa/Nairobi')->addDays(3);
                $plan_type_update->second_date = Carbon::now('Africa/Nairobi')->addDays(6);
                $plan_type_update->third_date = Carbon::now('Africa/Nairobi')->addDays(9);
                $plan_type_update->return_date = Carbon::now('Africa/Nairobi')->addDays(12);
                $plan_type_update->claim_status_one = 1;
                $plan_type_update->claim_status_two = 1;
                $plan_type_update->claim_status_three = 1;
                $plan_type_update->claim_status_four = 1;
            }else{
                $plan_type_update->return_date = Carbon::now('Africa/Nairobi')->addDays($plan->return_date);
            }
        }
        $plan_type_update->save();



        return back()->with('success','Plan Successfully Created');
    }


}
