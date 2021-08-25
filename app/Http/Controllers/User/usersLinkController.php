<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BiolinkBlock;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class usersLinkController extends Controller
{
    function index()
    {
        $data['page_title'] = "link managemant";

        $data['links'] = Link::all();

        return view('users.links.links', $data);
    }

    function show($id)
    {

        $link = Link::Where('id',$id)->first();

        $link_settings = json_decode($link->settings);

        $plan_Settings = json_decode(Auth::user()->plan->plan->settings);

        $data['page_title'] = 'Biolink Settings';
        $data['link'] = $link;
        $data['link_settings'] = $link_settings;
        $data['biolink_backgrounds'] = require app_path().'/includes/biolink_backgrounds.php';
        $data['plan_settings'] = $plan_Settings;
        $data['biolink_socials'] = require app_path().'/includes/biolink_socails.php';
        $data['biolink_fonts'] = require app_path().'/includes/biolink_fonts.php';
        $data['biolink_blocks'] = require app_path().'/includes/biolink_blocks.php';
        $data['biolinks_blocks'] = BiolinkBlock::where('link_id',$id)->where('user_id',Auth::user()->id)->get();

        return view('users.links.link',$data);
    }

    function createBiolink(Request $request)
    {
        $url = $request->url ? $request->url: Str::random(10);

        // check if available biolink url does not exceed maximum

        //settings
        $settings = json_encode([
            'title' => $request->url,
            'description' => null,
            'display_verified' => false,
            'image' => '',
            'background_type' => 'preset',
            'background' => 'one',
            'text_color' => 'white',
            'socials_color' => 'white',
            'display_branding' => true,
            'branding' => [
                'url' => '',
                'name' => ''
            ],
            'seo' => [
                'block' => false,
                'title' => '',
                'meta_description' => '',
                'image' => '',
            ],
            'utm' => [
                'medium' => '',
                'source' => '',
            ],
            'socials' => [],
            'font' => null,
            'password' => null,
            'sensitive_content' => false,
            'leap_link' => null
        ]);

        //insert into db
        $link = Link::create([
            'user_id'=>Auth::user()->id,
            'type'=>'biolink',
            'url'=>$url,
            'settings'=>$settings
        ]);

        $settings = json_encode([
            'name' => Auth::user()->name,
            'text_color' => 'black',
            'background_color' => 'white',
            'outline' => false,
            'border_radius' => 'rounded',
            'animation' => false,
            'animation_runs' => 'repeat-1',
            'icon' => '',
            'image' => ''
        ]);

        BiolinkBlock::create([
            'link_id'=>$link->id,
            'user_id'=>Auth::user()->id,
            'type'=>'link',
            'location_url'=>url(''),
            'settings'=>$settings
        ]);


        return response()->json(['status'=>'success','url'=>url('user/link/'.$link->id)]);

    }
}
