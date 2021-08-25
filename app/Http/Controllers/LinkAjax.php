<?php

namespace App\Http\Controllers;

use App\Models\BiolinkBlock;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\VarDumper\Caster\LinkStub;

class LinkAjax extends Controller
{
    public function index(Request $request) {
        switch($request->request_type) {

            /* Status toggle */
            case 'is_enabled_toggle':
                return $this->is_enabled_toggle($request); break;

            /* Create */
            case 'create': return $this->create($request); break;

            /* Update */
            case 'update': return $this->update($request); break;

            /* Delete */
            case 'delete': return $this->delete($request); break;

        }
    }

    private function is_enabled_toggle(Request $request) {
        $request->link_id = (int) $request->link_id;

        /* Get the current status */
        $link = Link::where('id',$request->link_id)->first();

        if($link) {

            $new_is_enabled = (int) !$link->is_enabled;


            Link::where('id',$request->link_id)->update([
                'is_enabled' => $new_is_enabled
            ]);


            return response()->json(['', 'success']);
        }
    }

    private function create(Request $request) {
        $request->type = $request->type;

        /* Check for possible errors */
        if(!in_array($request->type, ['link', 'biolink'])) {
            die();
        }

        switch($request->type) {
            case 'link':
                return $this->create_link($request);
            break;

            case 'biolink':
                return $this->create_biolink($request);
            break;
        }


    }

    private function create_link(Request $request) {
        $request->location_url = $request->location_url;
        $request->url = !empty($request->url) ? $request->url : false;

        $request->sensitive_content = (bool) isset($request->sensitive_content);


        /* Check if custom domain is set */
        $domain_id = $this->get_domain_id($request->domain_id ?? false);

        if(empty($request->location_url)) {
            return response()->json(language()->global->error_message->empty_fields, 'error');
        }

        $this->check_url($request->url);

        $this->check_location_url($request->location_url);

        /* Make sure that the user didn't exceed the limit */
        $user_total_links = Link::where('user_id',Auth::user()->id)->count();

        $plan_settings = json_decode(Auth::user()->plan->plan->settings);

        if($plan_settings->links_limit != -1 && $user_total_links >= $plan_settings->links_limit) {
            return response()->json(language()->create_link_modal->error_message->links_limit, 'error');
        }

        /* Check for duplicate url if needed */
        if($request->url) {


            $url_check = Link::where('url',$request->url)->count();

            if($url_check > 0)
            {
                return response()->json(language()->create_link_modal->error_message->url_exists, 'error');
            }

        }

        if(empty($errors)) {
            $url = $request->url ? $request->url : Str::random(10);
            $type = 'link';
            $settings = json_encode([
                'password' => null,
                'sensitive_content' => false,
            ]);

            /* Generate random url if not specified */

            /* Insert to database */
            $link = Link::create([
                'user_id' => Auth::user()->id,
                'domain_id' => $domain_id,
                'type' => $type,
                'url' => $url,
                'location_url' => $request->location_url,
                'settings' => $settings,
            ]);


            return response()->json('', 'success', ['url' => url('user/link/' . $link->id)]);
        }
    }

    private function create_biolink(Request $request) {
        $request->url = !empty($request->url) ? $request->url : false;



        /* Check if custom domain is set */
        $domain_id = $this->get_domain_id($request->domain_id ?? false);

        /* Make sure that the user didn't exceed the limit */
        $user_total_links = Link::where('user_id',Auth::user()->id)->count();

        $plan_settings = json_decode(Auth::user()->plan->plan->settings);

        if($plan_settings->links_limit != -1 && $user_total_links >= $plan_settings->links_limit) {
            return response()->json(language()->create_link_modal->error_message->links_limit, 'error');
        }

        /* Check for duplicate url if needed */
        if($request->url) {


            $url_check = Link::where('url',$request->url)->count();

            if($url_check > 0)
            {
                return response()->json(language()->create_link_modal->error_message->url_exists, 'error');
            }

        }

        /* Start the creation process */
        $url = $request->url ? $request->url : Str::random(10);
        $type = 'biolink';
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

        $this->check_url($request->url);

        /* Insert to database */
        $link = Link::create([
            'user_id' => Auth::user()->id,
            'domain_id' => $domain_id,
            'type' => $type,
            'url' => $url,
            'settings' => $settings,
        ]);

        /* Insert a first biolink link */
        $location_url = url();
        $type = 'link';
        $settings = json_encode([
            'name' => $this->user->name,
            'text_color' => 'black',
            'background_color' => 'white',
            'outline' => false,
            'border_radius' => 'rounded',
            'animation' => false,
            'animation_runs' => 'repeat-1',
            'icon' => '',
            'image' => ''
        ]);

        /* Insert */
        BiolinkBlock::create([
            'link_id'=>$link->id,
            'user_id'=>Auth::user()->id,
            'type'=>'link',
            'location_url'=>url(''),
            'settings'=>$settings
        ]);


       return response()->json('', 'success', ['url' => url('user/link/' . $link->id)]);
    }

    private function update(Request $request) {

            $request->type = $request->type;

            /* Check for possible errors */
            if(!in_array($request->type, ['link', 'biolink'])) {
                die();
            }

            switch($request->type) {
                case 'link':
                    return $this->update_link($request);
                break;

                case 'biolink':
                    return $this->update_biolink($request);
                break;
            }


    }

    private function update_biolink(Request $request) {
        // $request->project_id = empty($request->project_id) ? null : (int) $request->project_id;

        $request->title = $request->title;
        $request->description = $request->description;
        $request->url = !empty($request->url) ? $request->url : false;


        $link = Link::where('id',$request->link_id)->first();



        $link->settings = json_decode($link->settings);

        // if($request->url == $link->url) {
        //     $url = $link->url;
        //     return response()->json(['message'=>language()->create_biolink_modal->error_message->url_exists, 'status'=>'error']);

        // } else {
        //     $url = $request->url ? $request->url : Str::random(10);

        //     $this->check_url($request->url);
        // }


        $url = $request->url ? $request->url : Str::random(10);



        /* Image upload */
        $image_allowed_extensions = ['jpg', 'jpeg', 'png', 'svg', 'ico', 'gif'];
        $image = (bool) !empty($_FILES['image']['name']);
        $image_delete = isset($request->image_delete) && $request->image_delete == 'true';

        if($image && !$image_delete) {
            $image_file_extension = $request->file('image')->getClientOriginalExtension();

            if(!in_array($image_file_extension, $image_allowed_extensions)) {
                return response()->json(['message'=>language()->global->error_message->invalid_file_type, 'status'=>'error']);
            }

            if($request->file('image')->getSize() > settings()->links->avatar_size_limit * 1000000) {
                return response()->json(['message'=>sprintf(language()->global->error_message->file_size_limit, settings()->links->avatar_size_limit), 'status'=>'error']);
            }

            /* Generate new name for logo */
            $image_new_name = md5(time() . rand()) . '.' . $image_file_extension;

            /* Local uploading */

                /* Delete current file */
                if(!empty($link->settings->image) && file_exists(public_path('uploads/avatars/'.$link->settings->image))) {
                    unlink(public_path('uploads/avatars/'.$link->settings->image));
                }

                /* Upload the original */
                $request->file('image')->move(public_path('uploads/avatars/'),$image_new_name);


        }

        /* Delete avatar */
        if($image_delete) {

                /* Delete current file */
                if(!empty($link->settings->image) && file_exists(public_path('uploads/avatars/'.$link->settings->image) )) {
                    unlink('uploads/avatars/'.$link->settings->image);
                }

        }


        $request->text_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->text_color) ? '#fff' : $request->text_color;
        $request->socials_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->socials_color) ? '#fff' : $request->socials_color;
        $biolink_backgrounds = require app_path() . '/includes/biolink_backgrounds.php';
        $request->background_type = array_key_exists($request->background_type, $biolink_backgrounds) ? $request->background_type : 'preset';
        $background = 'one';

        switch($request->background_type) {
            case 'preset':
                $background = in_array($request->background, $biolink_backgrounds['preset']) ? $request->background : 'one';
                break;

            case 'color':

                $background = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->background) ? '#000' : $request->background;

                break;

            case 'gradient':

                $color_one = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->background[0]) ? '#000' : $request->background[0];
                $color_two = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->background[1]) ? '#000' : $request->background[1];

                $background = [
                    'color_one' => $color_one,
                    'color_two' => $color_two
                ];

                break;

            case 'image':

                $background = (bool) !empty($request->file('background'));

                /* Check for any errors on the logo image */
                if($background) {
                    $background_file_extension = $request->file('background')->getClientOriginalExtension();

                    if(!in_array($background_file_extension, $image_allowed_extensions)) {
                        return response()->json(['message'=>language()->global->error_message->invalid_file_type, 'status'=>'error']);
                    }

                    if($request->file('background')->getSize() > settings()->links->background_size_limit * 1000000) {
                        return response()->json(['message'=>sprintf(language()->global->error_message->file_size_limit, settings()->links->background_size_limit),'status'=>'error']);
                    }

                    /* Generate new name */
                    $background_new_name = md5(time() . rand()) . '.' . $background_file_extension;

                    /* Offload uploading */


                    /* Local uploading */

                        /* Delete current file */
                        if(is_string($link->settings->background) && !empty($link->settings->background) && file_exists(public_path(). '/uploads/backgrounds/' . $link->settings->background)) {
                            unlink(public_path(). '/uploads/backgrounds/' . $link->settings->background);
                        }

                        /* Upload the original */
                        // move_uploaded_file($background_file_temp, UPLOADS_PATH . 'backgrounds/' . $background_new_name);
                        $request->file('background')->move(public_path('uploads/backgrounds/'),$background_new_name);

                    $background = $background_new_name;
                }

                break;
        }

        /* Delete existing background file if needed */
        if($request->background_type != 'image' && is_string($link->settings->background)) {
            /* Local deleting */

                /* Delete current file */
                if(!empty($link->settings->background) && file_exists(public_path(). '/uploads/backgrounds/' . $link->settings->background)) {
                    unlink(public_path(). '/uploads/backgrounds/' . $link->settings->background);
                }

        }

        $request->display_branding = (bool) isset($request->display_branding);
        $request->display_verified = (bool) isset($request->display_verified);
        $request->branding_name = $request->branding_name;
        $request->branding_url = $request->branding_url;
        $request->utm_medium = $request->utm_medium;
        $request->utm_source = $request->utm_source;
        $request->password = !empty($request->qweasdzxc) ?
            ($request->qweasdzxc != $link->settings->password ? Hash::make($request->qweasdzxc) : $link->settings->password)
            : null;
        $request->sensitive_content = (bool) isset($request->sensitive_content);
        // $request->leap_link= $request->leap_link ?? null;
        $this->check_location_url($request->leap_link, true);

        /* Make sure the socials sent are proper */
        $biolink_socials =  require app_path().'/includes/biolink_socails.php';

        $socials = [];

        foreach($request->socials as $key => $value) {

            if(!array_key_exists($key, $biolink_socials)) {
                unset($request->socials[$key]);
            } else {
                $socials[$key] = $request->socials[$key];
            }

        }

        /* Make sure the font is ok */
        $biolink_fonts = require app_path() . '/includes/biolink_fonts.php';
        $request->font = !array_key_exists($request->font, $biolink_fonts) ? false : $request->font;

        /* Set the new settings variable */
        $settings = json_encode([
            'title' => $request->title,
            'description' => $request->description,
            'display_verified' => $request->display_verified,
            'image' => $image_delete ? '' : ($image ? $image_new_name : $link->settings->image),
            'background_type' => $request->background_type,
            'background' => $background ? $background : $link->settings->background,
            'text_color' => $request->text_color,
            'socials_color' => $request->socials_color,
            'display_branding' => $request->display_branding,
            'branding' => [
                'name' => $request->branding_name,
                'url' => $request->branding_url,
            ],
            // 'seo' => [
            //     'block' => $request->['seo_block'],
            //     'title' => $request->['seo_title'],
            //     'meta_description' => $request->['seo_meta_description'],
            //     'image' => $db_seo_image,
            // ],
            'utm' => [
                'medium' => $request->utm_medium,
                'source' => $request->utm_source,
            ],
            'socials' => $socials,
            'font' => $request->font,
            'password' => $request->password,
            // 'sensitive_content' => $request->sensitive_content,
            // 'leap_link' => $request->leap_link,
        ]);

        /* Update the record */
        Link::where('id',$request->link_id)->update([
            'url' => $url,
            'settings' => $settings,
            // 'project_id' => $request->project_id,
            // 'domain_id' => $domain_id,
            // 'pixels_ids' => $request->pixels_ids,
        ]);

        /* Update the biolink page blocks if needed */


        return response()->json(['message'=>language()->link->success_message->settings_updated, 'status'=>'success']);

    }

    private function update_link(Request $request) {
       $request->link_id = (int)$request->link_id;
        // $request->project_id = empty($request->project_id) ? null : (int) $request->project_id;
       $request->url = !empty($request->url) ? $request->url: false;
        $request->location_url = $request->location_url;
        // if(isset($request->schedule) && !empty($request->start_date) && !empty($request->end_date) && Date::validate($request->start_date, 'Y-m-d H:i:s') && Date::validate($request->end_date, 'Y-m-d H:i:s')) {
        //     $request->start_date= (new \DateTime($request->start_date, new \DateTimeZone($this->user->timezone)))->setTimezone(new \DateTimeZone(\Altum\Date::$default_timezone))->format('Y-m-d H:i:s');
        //     $request->end_date = (new \DateTime($request->end_date, new \DateTimeZone($this->user->timezone)))->setTimezone(new \DateTimeZone(\Altum\Date::$default_timezone))->format('Y-m-d H:i:s');
        // } else {
        //     $request->start_date = $request->end_date = null;
        // }
        $request->expiration_url = $request->expiration_url ?? null;
        $request->clicks_limit = empty($request->clicks_limit) ? null : (int) $request->clicks_limit;
        $this->check_location_url($request->expiration_url, true);
        $request->sensitive_content = (bool) isset($request->sensitive_content);


        /* Check for any errors */
        $required_fields = $request->location_url;
        foreach($required_fields as $field) {
            if(!isset($request->$field) || (isset($request->$field) && empty($request->$field))) {
                return response()->json(language()->global->error_message->empty_fields, 'error');
                break 1;
            }
        }

        $this->check_url($request->url);

        $this->check_location_url($request->location_url);

        $link = Link::where('id',$request->link_id)->first();

        $link->settings = json_decode($link->settings);

        /* Check for a password set */
        $request->password = !empty($request->qweasdzxc) ?
            ($request->qweasdzxc != $link->settings->password ? Hash::make($request->qweasdzxc) : $link->settings->password)
            : null;


        /* Check for duplicate url if needed */
        if($request->url && ($request->url != $link->url)) {

            $link = Link::where('id',$request->link_id)->first();


        if($request->url == $link->url) {
            $url = $link->url;
            return response()->json(language()->create_biolink_modal->error_message->url_exists, 'error');

        }

        }

        $url =$request->url;

        // if(empty($request->url)) {
        //     /* Generate random url if not specified */
        //     $url = string_generate(10);

        //     while(db()->where('url', $url)->where('domain_id', $domain_id)->getValue('links', 'link_id')) {
        //         $url = string_generate(10);
        //     }

        // }

        /* Prepare the settings */
        $targeting_types = ['country_code', 'device_type', 'browser_language', 'rotation'];
        $request->targeting_type = in_array($request->targeting_type, array_merge(['false'], $targeting_types)) ? $request->targeting_type : 'false';

        $settings = [
            'clicks_limit' => $request->clicks_limit,
            'expiration_url' => $request->expiration_url,
            'password' => $request->password,
            'sensitive_content' => $request->sensitive_content,
            'targeting_type' => $request->targeting_type,
        ];

        /* Process the targeting */
        // foreach($targeting_types as $targeting_type) {
        //     if(isset($request->'targeting_'.$targeting_type . '_key')) {
        //         ${'targeting_' . $targeting_type} = [];

        //         foreach ($request->'targeting_' . $targeting_type . '_key' as $key => $value) {
        //             if (empty(trim($value))) continue;

        //             ${'targeting_' . $targeting_type}[] = [
        //                 'key' => trim(Database::clean_string($value)),
        //                 'value' => trim(Database::clean_string($request->['targeting_' . $targeting_type . '_value'][$key])),
        //             ];
        //         }

        //         $settings['targeting_' . $targeting_type] = ${'targeting_' . $targeting_type};
        //     }
        // }

        $settings = json_encode($settings);

        Link::where('id',$request->link_id)->update([
            // 'project_id' => $request->project_id,
            // 'domain_id' => $domain_id,
            // 'pixels_ids' => $request->pixels_ids,
            'url' => $url,
            'location_url' => $request->location_url,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'settings' => $settings,
        ]);


        return response()->json(['message'=>language()->link->success_message->settings_updated,'status'=> 'success']);
    }

    private function delete(Request $request) {

        Link::where('id',$request->link_id)->delete();

        return response()->json(['status'=>'success', 'url' => url('user/links')]);

    }

    /* Function to bundle together all the checks of a custom url */
    private function check_url($url) {

        if($url) {
            /* Make sure the url alias is not blocked by a route of the product */
            // if(array_key_exists($url, Router::$routes[''])) {
            //     response()->json(language()->link->error_message->blacklisted_url, 'error');
            // }

            /* Make sure the custom url is not blacklisted */
            if(in_array(mb_strtolower($url), explode(',', settings()->links->blacklisted_keywords))) {
                response()->json(language()->link->error_message->blacklisted_keyword, 'error');
            }

        }

    }

    /* Function to bundle together all the checks of an url */
    private function check_location_url($url, $can_be_empty = false) {

        // if(empty(trim($url)) && $can_be_empty) {
        //     return;
        // }

        // if(empty(trim($url))) {
        //     response()->json(language()->global->error_message->empty_fields, 'error');
        // }

        // $url_details = parse_url($url);

        // if(!isset($url_details['scheme'])) {
        //     response()->json(language()->link->error_message->invalid_location_url, 'error');
        // }

        // if(!$this->user->plan_settings->deep_links && !in_array($url_details['scheme'], ['http', 'https'])) {
        //     response()->json(language()->link->error_message->invalid_location_url, 'error');
        // }

        // /* Make sure the domain is not blacklisted */
        // if(in_array(mb_strtolower(get_domain($url)), explode(',', settings()->links->blacklisted_domains))) {
        //     response()->json(language()->link->error_message->blacklisted_domain, 'error');
        // }

        /* Check the url with google safe browsing to make sure it is a safe website */
        // if(settings()->links->google_safe_browsing_is_enabled) {
        //     if(google_safe_browsing_check($url, settings()->links->google_safe_browsing_api_key)) {
        //         response()->json(language()->link->error_message->blacklisted_location_url, 'error');
        //     }
        // }
    }

    /* Check if custom domain is set and return the proper value */
    private function get_domain_id($posted_domain_id) {

        // $domain_id = 0;

        // if(isset($posted_domain_id)) {
        //     $domain_id = (int) Database::clean_string($posted_domain_id);

        //     /* Make sure the user has access to global additional domains */
        //     if($this->user->plan_settings->additional_global_domains) {
        //         $domain_id = database()->query("SELECT `domain_id` FROM `domains` WHERE `domain_id` = {$domain_id} AND (`user_id` = {$this->user->user_id} OR `type` = 1)")->fetch_object()->domain_id ?? 0;
        //     } else {
        //         $domain_id = database()->query("SELECT `domain_id` FROM `domains` WHERE `domain_id` = {$domain_id} AND `user_id` = {$this->user->user_id}")->fetch_object()->domain_id ?? 0;
        //     }

        // }

        // return $domain_id;
    }
}
