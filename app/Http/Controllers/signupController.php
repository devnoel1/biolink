<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use App\Models\UserPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class signupController extends Controller
{
    function index()
    {
        return view('front.signup');
    }

    function signup(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);


        $user = User::create([
            'name'=>$request->fullname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        $plan = Plan::where('is_payable',0)->first();

        //SET PLAN FOR STARTER USER
        UserPlan::create([
            'user_id'=>$user->id,
            'plan_id'=>$plan->id
        ]);

        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if(Auth::user()->is_admin)
        {
            return redirect('admin/dashboard');
        }

        return redirect('user/dashboard');
    }
}
