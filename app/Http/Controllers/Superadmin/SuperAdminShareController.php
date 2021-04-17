<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\user_plan;
use Illuminate\Http\Request;

class SuperAdminShareController extends Controller
{
    public function normal_share_list()
    {
        $plans = user_plan::orderBy('id','desc')
            ->where('plan_type',2)
            ->paginate(15);
        return view('superadmin.share.normalShareList',compact('plans'));
    }


    public function shared_share_list()
    {
        $plans = user_plan::orderBy('id','desc')
            ->where('plan_type',1)
            ->paginate(15);
        return view('superadmin.share.sharedShareList',compact('plans'));
    }

    public function scpecial_share_list()
    {
        $plans = user_plan::orderBy('id','desc')
            ->where('plan_type',3)
            ->paginate(15);
        return view('superadmin.share.scecialShareList',compact('plans'));
    }

}
