<?php

namespace App\Http\Controllers;

use App\Jobs\passwordResetEmailHander;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    function index()
    {
        return view('front.login');
    }

    function signin(Request $request)
    {
       $request->validate([
           'email'=>'required|email',
           'password'=>'required'
       ]);

       if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
       {
            if(Auth::user()->is_admin)
            {
                return redirect('admin/dashboard');
            }

            return redirect('user/dashboard');
       }
       else
       {
           return back()->with('error','Invalid login creadentials');
       }
    }

    function forgotPassword(Request $request)
    {
        $request->validate([
            'email'=>'required|email'
        ]);

        passwordResetEmailHander::dispatch($request->email);

        $request->session()->flash('message','A reset password link is sent to you email');
        $request->session()->flash('type','success');

        return back();
    }

    function paswordReset()
    {

    }
}
