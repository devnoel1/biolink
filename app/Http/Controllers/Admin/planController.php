<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Contracts\Session\Session;

class planController extends Controller
{
    public function index()
    {
        $data['page_title'] = "plans management";
        $data['button'] = [
            'title'=>'Create Plan',
            'link'=>'admin/create-plan'
        ];

        $data['plans'] = Plan::all();

        return view('admin.plans.plans',$data);
    }

    public function create()
    {
        $data['page_title'] = "create a new plan";

        $data['button'] = [
            'title'=>'Plan List',
            'link'=>'admin/plans'
        ];

        $data['biolink_block'] = require  app_path().'/includes/biolink_blocks.php';

        return view('admin.plans.add-plans',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan_name'=>'required',
            'price'=>'required|numeric',
            'plan_duration'=>'numeric',
        ]);


        $enabled_biolink_blocks = [];

        foreach( require  app_path().'/includes/biolink_blocks.php' as $key=>$item)
        {
            $enabled_biolink_blocks[$key] = (bool) $request->enabled_biolink_blocks && in_array($key,$request->enabled_biolink_blocks);
        }


        $settings = json_encode([
            'additional_global_domains'=>(bool) $request->additional_global_domains,
            'no_ads' => (bool) $request->no_ads,
            'deep_links' => (bool) $request->deep_links,
            'custom_url' => (bool) $request->custom_url,
            'utm' => (bool) $request->utm,
            'removable_branding' => (bool) $request->removable_branding,
            'custom_colored_links' => (bool) $request->custom_colored_links,
            'custom_backgrounds' => (bool) $request->custom_backgrounds,
            'verified' => (bool) $request->verified,
            'temporary_url_is_enabled' => (bool) $request->temporary_url_is_enabled,
            'socials' => (bool) $request->socials,
            'fonts' => (bool) $request->fonts,
            'password' => (bool) $request->password,
            // 'sensitive_content'=>(bool) $request->sensitive_content,
            'custom_branding'=>(bool) $request->custom_branding,
            'biolinks_limit' => (int) $request->biolinks_limit,
            'links_limit' => (int) $request->links_limit,
            'enabled_biolink_blocks' => $enabled_biolink_blocks
        ]);

        Plan::create([
            'plan_name'=>$request->plan_name,
            'price'=>(float)$request->price,
            'duration'=>$request->plan_duration,
            'status'=> $request->plan_status == 'on'? '1':'0',
            'is_payable' => $request->payment_status == 'on'? '1':'0',
            'support'=>'',
            'settings'=>$settings
        ]);

        $request->session()->flash('message', 'Plan Created Successfuly');
        $request->session()->flash('type','success');

        return back();
    }

    public function show($id)
    {
        $data['page_title'] = "update plan details";
        $data['button'] = [
            'title'=>'Plan List',
            'link'=>'admin/plans'
        ];

        $data['biolink_block'] = require  app_path().'/includes/biolink_blocks.php';

        $plan = Plan::where('id',$id)->first();
        $settings = json_decode($plan->settings);

        $data['plan'] = $plan;
        $data['settings'] = $settings;

        return view('admin.plans.edit-plans',$data);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'plan_name'=>'required',
            'price'=>'required|numeric',
            'plan_duration'=>'numeric',
        ]);


        $enabled_biolink_blocks = [];

        foreach( require  app_path().'/includes/biolink_blocks.php' as $key=>$item)
        {
            $enabled_biolink_blocks[$key] = (bool) $request->enabled_biolink_blocks && in_array($key,$request->enabled_biolink_blocks);
        }


        $settings = json_encode([
            'additional_global_domains'=>(bool) $request->additional_global_domains,
            'no_ads' => (bool) $request->no_ads,
            'deep_links' => (bool) $request->deep_links,
            'custom_url' => (bool) $request->custom_url,
            'utm' => (bool) $request->utm,
            'removable_branding' => (bool) $request->removable_branding,
            'custom_colored_links' => (bool) $request->custom_colored_links,
            'custom_backgrounds' => (bool) $request->custom_backgrounds,
            'verified' => (bool) $request->verified,
            'temporary_url_is_enabled' => (bool) $request->temporary_url_is_enabled,
            'socials' => (bool) $request->socials,
            'fonts' => (bool) $request->fonts,
            'password' => (bool) $request->password,
            // 'sensitive_content'=>(bool) $request->sensitive_content,
            'custom_branding'=>(bool) $request->custom_branding,
            'biolinks_limit' => (int) $request->biolinks_limit,
            'links_limit' => (int) $request->links_limit,
            'enabled_biolink_blocks' => $enabled_biolink_blocks
        ]);



        Plan::where('id',$id)->update([
            'plan_name'=>$request->plan_name,
            'price'=>(float)$request->price,
            'duration'=>$request->plan_duration,
            'status'=> $request->plan_status == 'on'? '1':'0',
            'is_payable' => $request->payment_status == 'on'? '1':'0',
            'support'=>'',
            'settings'=>$settings
        ]);

        $request->session()->flash('message', 'Plan Updated Successfully');
        $request->session()->flash('type','success');

        return back();
    }

    public function destroy(Request $request, $id)
    {
        Plan::find($id)->delete();

        $request->session()->flash('message', 'Plan deleted Successfully');
        $request->session()->flash('type','success');

        return back();
    }
}
