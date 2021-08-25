<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userDashbordController extends Controller
{
    function index()
    {
        return view('users.dashboard');
    }
}
