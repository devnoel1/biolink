<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class registrationController extends Controller
{

    public function index()
    {
        return view('');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ]);



        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->pasword)
        ]);


        Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        return redirect('user/dashbord');
    }

}
