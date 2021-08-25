<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class linkController extends Controller
{
    function index()
    {
        $data['page_title'] = "link managemant";

        $data['links'] = Link::all();

        return view('admin.links.index', $data);
    }
}
