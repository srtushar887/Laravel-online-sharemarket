<?php

namespace App\Http\Controllers;

use App\Mail\ContactSendMail;
use App\Mail\UserAccountActivateMail;
use App\Mail\UserForgotPasswordMail;
use App\Models\blog;
use App\Models\blog_category;
use App\Models\blog_comment;
use App\Models\plan;
use App\Models\User;
use App\Models\user_plan;
use App\Models\user_withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $total_users = User::count();
        $plans=plan::orderBy('id','desc')->where('status',1)->get();
        $user_with = user_withdraw::orderBy('id','desc')->take(5)->get();
        $choose_plan = user_plan::orderBy('id','desc')->take(5)->get();
        $dep_count_am = user_plan::sum('amount');
        $wit_count_am = user_withdraw::sum('amount');
        $blogs = blog::orderBy('id','desc')->take(3)->get();
        return view('frontend.index',compact('total_users','plans','user_with','choose_plan','dep_count_am','wit_count_am','blogs'));
    }

    public function about_us()
    {
        return view('frontend.aboutUs');
    }

    public function how_it_works()
    {
        return view('frontend.howItWorks');
    }

    public function team()
    {
        return view('frontend.team');
    }



    public function blog()
    {
        $blogs = blog::orderBy('id','desc')->paginate(12);
        return view('frontend.blogs',compact('blogs'));
    }


    public function blog_details($id)
    {
        $blogs_details = blog::where('id',$id)->first();
        $blog_categories = blog_category::all();
        $recent_blogs = blog::where('id','!=',$id)->orderBy('id','desc')->take(4)->get();
        $comments = blog_comment::where('blog_id',$id)->orderBy('id', 'desc')->paginate(5);
        return view('frontend.blogDetails',compact('blogs_details','blog_categories','recent_blogs','comments'));
    }


    public function blog_comment_save(Request $request)
    {
        $new_comment = new blog_comment();
        $new_comment->blog_id = $request->blog_id;
        $new_comment->name = $request->name;
        $new_comment->email = $request->email;
        $new_comment->comment = $request->comment;
        $new_comment->save();
        return back()->with('success','Comment Successfully Saved');
    }




    public function contact_us()
    {
        return view('frontend.contactUs');
    }


    public function contact_us_send(Request $request)
    {
        $to = "info@investornpeers.co.ke";
        $msg = [
            'name' => $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'message'=> $request->message,
        ];
        Mail::to($to)->send(new ContactSendMail($msg));

        return back();

    }







}
