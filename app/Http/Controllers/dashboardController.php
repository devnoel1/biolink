<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    function index()
    {
        if(Auth::user()->is_admin)
        {
            return redirect('admin/dashboard');
        }

        return redirect('user/dashboard');
    }
}
