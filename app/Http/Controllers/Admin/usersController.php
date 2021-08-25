<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class usersController extends Controller
{
    function index()
    {
        $data['page_title'] = "users management";

        $data['users'] = User::where('is_admin',0)->get();

        return view('admin.users.index',$data);
    }

    function edit($id)
    {

    }

    public function show($id)
    {
        $data['page_title'] = "Edit User";

        return view('admin.users.show',$data);
    }

    public function update(Request $request,$id)
    {

    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return back();
    }

}
