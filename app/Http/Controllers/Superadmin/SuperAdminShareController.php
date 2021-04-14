<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\user_plan;
use Illuminate\Http\Request;

class SuperAdminShareController extends Controller
{
    public function buy_share_list()
    {
        $plans = user_plan::orderBy('id','desc')->paginate(15);
        return view('superadmin.share.buyShareList',compact('plans'));
    }

    public function normal_share_list(Request $request)
    {
        $plans = user_plan::where('plan_type',2)->orderBy('id','desc')
            ->with('user')
            ->paginate(15);
        return view('superadmin.share.normalShareList',compact('plans'));
    }
}
