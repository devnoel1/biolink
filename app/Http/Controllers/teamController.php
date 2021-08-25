<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class teamController extends Controller
{
    //
    function index()
    {
        return view('front.team');
    }
}
