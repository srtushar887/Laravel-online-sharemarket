<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {


        if (Auth::check()) {

            if (Auth::user()->is_account_veirified == 2){
                Auth::guard('web')->logout();
                return redirect(route('login'))->with('login_error','Sorry your account has been blocked, Kindly contact an admin');
            }

            if (Auth::user()->is_account_veirified == 1) {
                return $next($request);
            }
            else{
                Auth::guard('web')->logout();
                return redirect(route('login'))->with('login_error','Error, Please validate your email to continue');
            }
        }


    }
}
