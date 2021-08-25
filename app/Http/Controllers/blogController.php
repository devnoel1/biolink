<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class blogController extends Controller
{
    //
    function index()
    {
        return view('front.blog.index');
    }
}
