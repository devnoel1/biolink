<?php

namespace App\Http\Controllers;

use App\Core\Link as CoreLink;
use App\Core\Plugin;
use App\Models\BiolinkBlock;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;

class previewController extends Controller
{
    function index($url)
    {
        $link = Link::where('url',$url)->first();

        $user = User::where('id',$link->user_id)->first();

        $biolink_blocks = BiolinkBlock::where('link_id',$link->id)->where('is_enebled',1)->get();

        $biolink = CoreLink::get_biolink($link,$user,$biolink_blocks);

        $data['data'] = $biolink;
        $data['link'] = $link;
        $data['plan_settings'] = json_decode($user->plan->plan->settings);
        $data['biolink_socials'] = require app_path().'/includes/biolink_socails.php';

        return view('users.preview.biolink',$data);
    }


}
