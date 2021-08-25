<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    function index()
    {
        $data['page_title'] = "link managemant";

        $data['links'] = Link::all();

        return view('admin.links.index', $data);
    }

    function show($id)
    {

    }

    function update(Request $request, $id)
    {

    }

    function destroy()
    {

    }
}
