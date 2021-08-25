<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class helpController extends Controller
{
    //
    function index()
    {
        return view('front.help');
    }
}
