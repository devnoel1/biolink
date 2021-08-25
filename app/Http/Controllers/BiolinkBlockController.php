<?php

namespace App\Http\Controllers;

use App\Core\Date;
use App\Core\Plugin;
use App\Models\BiolinkBlock;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiolinkBlockController extends Controller
{
    function index(Request $request)
    {
        $all = $request->all();

        switch($request->request_type)
        {
            /* Status toggle */
            case 'is_enabled_toggle':
                   return $this->is_enabled_toggle($request);
                 break;
            /* Duplicate link */
            case 'duplicate': return $this->duplicate($request); break;

            /* Order links */
            case 'order': return $this->order($request); break;

            /* Create */
            case 'create':

                return $this->create($request); break;

            /* Update */
            case 'update': return $this->update($request); break;
            /* Delete */
            case 'delete': return $this->delete($request); break;
        }
    }

    function is_enabled_toggle(Request $request)
    {

        $biolink_block = BiolinkBlock::where('id',$request->biolink_block_id)->first();

        if($biolink_block->is_enebled == 1)
        {
            $new_is_enable = 0;
        }
        else
        {
            $new_is_enable = 1;
        }

        BiolinkBlock::where('id',$request->biolink_block_id)->update([
            'is_enebled' => $new_is_enable
        ]);

        return response()->json(['status'=>'success']);

    }

    function duplicate(Request $request)
    {
        $biolink_block = BiolinkBlock::where('id',$request->biolink_block_id)->first();

        if($biolink_block) {
            $biolink_block->settings = json_decode($biolink_block->settings);

            $settings = json_encode([
                'name' => $biolink_block->settings->name,
                'image' => $biolink_block->settings->image,
                'text_color' => $biolink_block->settings->text_color,
                'background_color' => $biolink_block->settings->background_color,
                'outline' => $biolink_block->settings->outline,
                'border_radius' => $biolink_block->settings->border_radius,
                'animation' => $biolink_block->settings->animation,
                'animation_runs' => $biolink_block->settings->animation_runs,
                'icon' => $biolink_block->settings->icon
            ]);

            /* Database query */
            BiolinkBlock::create([
                'user_id' => Auth::user()->id,
                'link_id' => $biolink_block->link_id,
                'type' => $biolink_block->type,
                'location_url' => $biolink_block->location_url,
                'settings' => $settings,
                'start_date' => $biolink_block->start_date,
                'end_date' => $biolink_block->end_date,
                'is_enebled' => $biolink_block->is_enebled,
            ]);


            return response()->json(['status'=>'success', 'url' => url('user/link/' . $biolink_block->link_id)]);

        }
    }

    function order(Request $request)
    {
        if(isset($request->biolink_blocks) && is_array($request->biolink_blocks)) {
            foreach($request->biolink_blocks as $link) {
                $link['link_id'] = (int) $link['link_id'];
                $link['order'] = (int) $link['order'];

                /* Update the link order */
                BiolinkBlock::where('id',$link['biolink_block_id'])->update([
                    'order'=>$link['order']
                ]);

            }
        }

        return response()->json(['status'=>'success']);
    }

    function create(Request $request)
    {
         /* Check for available biolink blocks */
         if(isset($request->type) && array_key_exists($request->type, require app_path() . '/includes/biolink_blocks.php')) {
            $request->type = $request->type;

            if(in_array($request->type, ['link', 'mail', 'rss_feed', 'custom_html', 'vcard', 'text', 'image', 'image_grid', 'divider'])) {
               return $this->{'create_biolink_' . $request->type}($request);
            } else {
               return $this->create_biolink_other($request->type, $request);
            }

        }
    }

    private function update(Request $request) {

        if(!empty($request)) {
            /* Check for available biolink blocks */
            if(isset($request->type) && array_key_exists($request->type, require app_path() . '/includes/biolink_blocks.php')) {
                $request->type = $request->type;

                if(in_array($request->type, ['link', 'mail', 'rss_feed', 'custom_html', 'vcard', 'text', 'image', 'image_grid', 'divider'])) {
                    return $this->{'update_biolink_' . $request->type}($request);
                } else {
                    return $this->update_biolink_other($request->type,$request);
                }

            }
        }

        die();
    }

    private function create_biolink_link(Request $request) {
        $request->link_id = (int) $request->link_id;
        $request->location_url = trim($request->location_url);
        $request->name = trim($request->name);

       $link = Link::where('id',$request->link_id)->first();

        $this->check_location_url($request->location_url);

        $type = 'link';
        $settings = json_encode([
            'name' => $request->name,
            'text_color' => 'black',
            'background_color' => 'white',
            'outline' => false,
            'border_radius' => 'rounded',
            'animation' => false,
            'animation_runs' => 'repeat-1',
            'icon' => '',
            'image' => '',
        ]);

        /* Database query */
        BiolinkBlock::create([
            'user_id' => Auth::user()->id,
            'link_id' => $request->link_id,
            'type' => $type,
            'location_url' => $request->location_url,
            'settings' => $settings,
        ]);

        return response()->json(['status'=>'success','url'=>url('user/link/'.$request->link_id)]);
    }

    private function create_biolink_other($type, Request $request) {
        $request->link_id = (int) $request->link_id;
        $request->location_url = trim($request->location_url);

        $link = Link::where('id',$request->link_id)->first();

        $this->check_location_url( $request->location_url);

        $settings = json_encode([]);

        /* Database query */
        BiolinkBlock::create([
            'user_id' => Auth::user()->id,
            'link_id' => $request->link_id,
            'type' => $type,
            'location_url' => $request->location_url,
            'settings' => $settings,
        ]);

        return response()->json(['status'=>'success','url'=>'/user/link/'.$request->link_id]);
    }

    private function create_biolink_mail(Request $request) {
        $request->link_id = (int) $request->link_id;
        $request->name = trim($request->name);

        $link = Link::where('id',$request->link_id)->first();

        $type = 'mail';
        $settings = json_encode([
            'name' => $request->name,
            'image' => '',
            'text_color' => 'black',
            'background_color' => 'white',
            'outline' => false,
            'border_radius' => 'rounded',
            'animation' => false,
            'animation_runs' => 'repeat-1',
            'icon' => '',

            'email_placeholder' => language()->link->biolink->mail->email_placeholder_default,
            'name_placeholder' => language()->link->biolink->mail->name_placeholder_default,
            'button_text' => language()->link->biolink->mail->button_text_default,
            'success_text' => language()->link->biolink->mail->success_text_default,
            'thank_you_url' => '',
            'show_agreement' => false,
            'agreement_url' => '',
            'agreement_text' => '',
            'mailchimp_api' => '',
            'mailchimp_api_list' => '',
            'webhook_url' => ''
        ]);

        /* Database query */
        BiolinkBlock::create([
            'user_id' => Auth::user()->id,
            'link_id' => $request->link_id,
            'type' => $type,
            'settings' => $settings,
        ]);

        return response()->json(['status'=>'success', 'url' => url('user/link/' . $request->link_id)]);
    }

    private function create_biolink_rss_feed(Request $request) {
        $request->link_id = (int) $request->link_id;
        $request->ocation_url = trim($request->ocation_url);


        $this->check_location_url($request->ocation_url);

        $type = 'rss_feed';
        $settings = json_encode([
            'amount' => 5,
            'text_color' => 'black',
            'background_color' => 'white',
            'outline' => false,
            'border_radius' => 'rounded',
            'animation' => false,
            'animation_runs' => 'repeat-1',
        ]);

        /* Database query */
        BiolinkBlock::create([
            'user_id' => Auth::user()->id,
            'link_id' => $request->link_id,
            'type' => $type,
            'location_url' => $request->location_url,
            'settings' => $settings,
        ]);

        return response()->json(['status'=>'success', 'url' => url('user/link/' . $request->link_id)]);
    }

    private function create_biolink_custom_html(Request $request) {
        $request->link_id = (int) $request->link_id;
        $request->html = trim($request->html);



        $type = 'custom_html';
        $settings = json_encode([
            'html' => $request->html
        ]);

        /* Database query */
        BiolinkBlock::create([
            'user_id' => Auth::user()->id,
            'link_id' => $request->link_id,
            'type' => $type,
            'location_url' => null,
            'settings' => $settings,
        ]);

        return response()->json(['status'=>'success', 'url' => url('user/link/' . $request->link_id)]);
    }

    private function create_biolink_vcard(Request $request) {
        $request->link_id = (int) $request->link_id;
        $request->name = trim($request->name);

        $type = 'vcard';
        $settings = [
            'name' => $request->name,
            'image' => '',
            'first_name' => '',
            'last_name' => '',
            'text_color' => 'black',
            'background_color' => 'white',
            'outline' => false,
            'border_radius' => 'rounded',
            'animation' => false,
            'animation_runs' => 'repeat-1',
            'icon' => '',
        ];
        foreach(['first_name', 'last_name', 'phone', 'street', 'city', 'zip', 'region', 'country', 'email', 'website', 'note'] as $key) {
            $settings[$key] = '';
        }
        $settings = json_encode($settings);

        /* Database query */
        BiolinkBlock::create([
            'user_id' => Auth::user()->id,
            'link_id' => $request->link_id,
            'type' => $type,
            'location_url' => null,
            'settings' => $settings,
        ]);


        return response()->json(['status'=>'success', 'url' => url('user/link/' . $request->link_id)]);
    }

    private function create_biolink_text(Request $request) {
        $request->link_id = (int) $request->link_id;
        $request->title = trim($request->title);
        $request->description = trim($request->description);


        $type = 'text';
        $settings = json_encode([
            'title' => $request->title,
            'description' => $request->description,
            'title_text_color' => 'white',
            'description_text_color' => 'white',
        ]);

        /* Database query */
        BiolinkBlock::create([
            'user_id' => Auth::user()->id,
            'link_id' => $request->link_id,
            'type' => $type,
            'location_url' => null,
            'settings' => $settings,
        ]);

        return response()->json(['status'=>'success', 'url' => url('user/link/' . $request->link_id)]);
    }

    private function create_biolink_image(Request $request) {
        $request->link_id = (int) $request->link_id;
        $request->location_url = trim($request->location_url);


        $this->check_location_url($request->location_url, true);

        /* Image upload */
        $db_image = $this->handle_image_upload(null,$request, 'block_images/', settings()->links->image_size_limit);

        $type = 'image';
        $settings = json_encode([
            'image' => $db_image,
        ]);

        /* Database query */
        BiolinkBlock::create([
            'user_id' => Auth::user()->id,
            'link_id' => $request->link_id,
            'type' => $type,
            'location_url' => $request->location_url,
            'settings' => $settings,
        ]);



        return response()->json(['status'=>'success', 'url' => url('user/link/' . $request->link_id)]);
    }

    private function create_biolink_image_grid(Request $request) {
        $request->link_id = (int) $request->link_id;
        $request->name = trim($request->name);
        $request->location_url = trim($request->location_url);

        $this->check_location_url($request->location_url, true);

        $db_image = $this->handle_image_upload(null,$request, 'block_images/', settings()->links->image_size_limit);

        $type = 'image_grid';
        $settings = json_encode([
            'name' => $request->name,
            'image' => $db_image,
        ]);

        /* Database query */
       BiolinkBlock::create([
        'user_id' => Auth::user()->id,
        'link_id' => $request->link_id,
        'type' => $type,
        'location_url' => $request->location_url,
        'settings' => $settings,
       ]);

        return response()->json(['status'=>'success', 'url' => url('user/link/' . $request->link_id)]);
    }

    private function create_biolink_divider(Request $request) {
        $request->link_id = (int) $request->link_id;
        $request->margin_to = $request->margin_to > 7 || $request->margin_to < 0 ? 3 : (int) $request->margin_to;
        $request->margin_bottom = $request->margin_bottom > 7 || $request->margin_bottom < 0 ? 3 : (int) $request->margin_bottom;

        $type = 'divider';
        $settings = json_encode([
            'margin_top' => $request->margin_to,
            'margin_bottom' => $request->margin_bottom,
            'background_color' => 'white',
            'icon' => 'fa fa-infinity'
        ]);

        /* Database query */
        BiolinkBlock::create([
            'user_id' => Auth::user()->id,
            'link_id' => $request->link_id,
            'type' => $type,
            'location_url' => null,
            'settings' => $settings,
        ]);

        return response()->json(['status'=>'success', 'url' => url('user/link/' . $request->link_id)]);
    }


    private function update_biolink_link(Request $request) {

        $request->biolink_block_id = (int) $request->biolink_block_id;
        $request->location_url = $request->location_url;
        $request->name = $request->name;
        $request->outline = (bool) isset($request->outline);
        $request->border_radius = in_array($request->border_radius, ['straight', 'round', 'rounded']) ? $request->border_radius : 'rounded';
        $request->animation = in_array($request->animation, require app_path() . '/includes/biolink_animations.php') || $request->animation == 'false' ? $request->animation : false;
        $request->animation_runs = in_array($request->animation_runs, ['repeat-1', 'repeat-2', 'repeat-3', 'infinite']) ? $request->animation_runs : false;
        $request->icon = $request->icon;
        $request->text_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->text_color) ? '#000' : $request->text_color;
        $request->background_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->background_color) ? '#fff' : $request->background_color;
        if(isset($request->schedule) && !empty($request->start_date) && !empty($request->end_date) && Date::validate($request->start_date, 'Y-m-d H:i:s') && Date::validate($request->end_date, 'Y-m-d H:i:s')) {
            $request->start_date = (new \DateTime($request->start_date, new \DateTimeZone($this->user->timezone)))->setTimezone(new \DateTimeZone(Date::$default_timezone))->format('Y-m-d H:i:s');
            $request->end_date = (new \DateTime($request->end_date, new \DateTimeZone($this->user->timezone)))->setTimezone(new \DateTimeZone(Date::$default_timezone))->format('Y-m-d H:i:s');
        } else {
            $request->start_date = $request->end_date = null;
        }

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();

        $biolink_block->settings = json_decode($biolink_block->settings);

        /* Check for any errors */
        $required_fields = ['location_url', 'name'];

        /* Check for any errors */
        foreach($required_fields as $field) {
            if(!isset($request[$field]) || (isset($request[$field]) && empty($request[$field]))) {
                return response()->json(language()->global->error_message->empty_fields, 'error');
                break 1;
            }
        }

        $this->check_location_url($request->location_url);

        /* Image upload */
        $db_image = $this->handle_image_upload($biolink_block->settings->image,$request, 'block_thumbnail_images/', settings()->links->thumbnail_image_size_limit);

        /* Check for the removal of the already uploaded file */
        if(isset($request->image_remove)) {
                /* Delete current file */
                if(!empty($biolink_block->settings->image) && file_exists(public_path() . '/public/uploads/block_thumbnail_images/' . $biolink_block->settings->image)) {
                    unlink(public_path() . '/public/uploads/block_thumbnail_images/' . $biolink_block->settings->image);

            $db_image = null;
        }
    }

        $image_url = $db_image ? public_path() . '/public/uploads/block_thumbnail_images/' . $db_image : null;

        $settings = json_encode([
            'name' => $request->name,
            'text_color' => $request->text_color,
            'background_color' => $request->background_color,
            'outline' => $request->outline,
            'border_radius' => $request->border_radius,
            'animation' => $request->animation,
            'animation_runs' => $request->animation_runs,
            'icon' => $request->icon,
            'image' => $db_image,
        ]);

        /* Database query */
        BiolinkBlock::where('id',$request->biolink_block_id)->update([
            'location_url' => $request->location_url,
            'settings' => $settings,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json(['message'=>language()->link->success_message->settings_updated, "status"=>'success', 'image_prop' => true, 'image_url' => $image_url]);
    }


    private function update_biolink_other($type, Request $request) {
        $request->biolink_block_id = (int) $request->biolink_block_id;
        $request->location_url = $request->location_url;

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();

        $this->check_location_url($request->location_url);

        /* Database query */
        BiolinkBlock::where('id', $request->biolink_block_id)->update([
            'location_url' => $request->location_url,
        ]);

        return response()->json([language()->link->success_message->settings_updated, 'success']);
    }

    private function update_biolink_mail(Request $request) {
        $request->biolink_block_id = (int) $request->biolink_block_id;
        $request->name = $request->name;
        $request->url = !empty($request->url) ? $request->url : false;
        $request->outline = (bool) isset($request->outline);
        $request->border_radius = in_array($request->border_radius, ['straight', 'round', 'rounded']) ? $request->border_radius : 'rounded';
        $request->animation = in_array($request->animation, require app_path() . '/includes/biolink_animations.php') || $request->animation == 'false' ? $request->animation : false;
        $request->animation_runs = in_array($request->animation_runs, ['repeat-1', 'repeat-2', 'repeat-3', 'infinite']) ? $request->animation_runs : false;
        $request->icon = $request->icon;
        $request->text_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->text_color) ? '#000' : $request->text_color;
        $request->background_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->background_color) ? '#fff' : $request->background_color;
        $request->email_placeholder = $request->email_placeholder;
        $request->name_placeholder = $request->name_placeholder;
        $request->button_text = $request->button_text;
        $request->success_text = $request->success_text;
        $request->show_agreement = (bool) isset($request->show_agreement);
        $request->agreement_url = $request->agreement_url;
        $request->agreement_text = $request->agreement_text;
        $request->mailchimp_api = $request->mailchimp_api;
        $request->mailchimp_api_list = $request->mailchimp_api_list;
        $request->webhook_url = $requestwebhook_url;
        $request->hank_you_url = $request->hank_you_url;

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();

        $biolink_block->settings = json_decode($biolink_block->settings);

        /* Image upload */
        $db_image = $this->handle_image_upload($biolink_block->settings->image,$request, 'block_thumbnail_images/', settings()->links->thumbnail_image_size_limit);

        /* Check for the removal of the already uploaded file */
        if(isset($request['image_remove'])) {

                if(!empty($biolink_block->settings->image) && file_exists(public_path() . '/public/uploads/block_thumbnail_images/' . $biolink_block->settings->image)) {
                    unlink(public_path() . '/public/uploads/block_thumbnail_images/' . $biolink_block->settings->image);
                }
            $db_image = null;
        }

        $image_url = $db_image ? public_path() . '/public/uploads/block_thumbnail_images/' . $db_image : null;

        $settings = json_encode([
            'name' => $request->name,
            'image' => $db_image,
            'text_color' => $request->text_color,
            'background_color' => $request->background_color,
            'outline' => $request->outline,
            'border_radius' => $request->border_radius,
            'animation' => $request->animation,
            'animation_runs' => $request->animation_runs,
            'icon' => $request->icon,
            'email_placeholder' => $request->email_placeholder,
            'name_placeholder' => $request['name_placeholder'],
            'button_text' => $request['button_text'],
            'success_text' => $request['success_text'],
            'thank_you_url' => $request->hank_you_url,
            'show_agreement' => $request['show_agreement'],
            'agreement_url' => $request['agreement_url'],
            'agreement_text' => $request['agreement_text'],
            'mailchimp_api' => $request['mailchimp_api'],
            'mailchimp_api_list' => $request['mailchimp_api_list'],
            'webhook_url' => $request['webhook_url']
        ]);

        BiolinkBlock::where('id', $request->biolink_block_id)->update(['settings' => $settings]);


        return response()->json(language()->link->success_message->settings_updated, 'success', ['image_prop' => true, 'image_url' => $image_url]);
    }

    private function update_biolink_rss_feed(Request $request) {
        $request->biolink_block_id = (int) $request->biolink_block_id;
        $request->location_url = $request->location_url;
        $request->amount = (int) $request->amount;
        $request->outline = (bool) isset($request->outline);
        $request->border_radius = in_array($request->border_radius, ['straight', 'round', 'rounded']) ? $request->border_radius : 'rounded';
        $request->animation = in_array($request->animation, require app_path() . '/includes/biolink_animations.php') || $request->animation == 'false' ? $request->animation : false;
        $request->animation_runs = in_array($request->animation_runs, ['repeat-1', 'repeat-2', 'repeat-3', 'infinite']) ? $request->animation_runs : false;
        $request->text_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->text_color) ? '#000' : $request->text_color;
        $request->background_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->background_color) ? '#fff' : $request->background_color;

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();

        $this->check_location_url($request->location_url);

        $settings = json_encode([
            'amount' => $request->amount,
            'text_color' => $request->text_color,
            'background_color' => $request->background_color,
            'outline' => $request->outline,
            'border_radius' => $request->border_radius,
            'animation' => $request->animation,
            'animation_runs' => $request->animation_runs,
        ]);

        /* Database query */
        BiolinkBlock::where('id', $request->biolink_block_id)->update([
            'location_url' => $request->location_url,
            'settings' => $settings,
        ]);

        return response()->json(language()->link->success_message->settings_updated, 'success');
    }

    private function update_biolink_custom_html(Request $request) {
        $request->biolink_block_id = (int) $request->biolink_block_id;
        $request->html = trim($request->html);

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();

        $settings = json_encode([
            'html' => $request->html,
        ]);

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();

        /* Database query */
        BiolinkBlock::where('id', $request->biolink_block_id)->update([
            'settings' => $settings,
        ]);

        return response()->json(language()->link->success_message->settings_updated, 'success');
    }

    private function update_biolink_vcard(Request $request) {
        $request->biolink_block_id = (int) $request->biolink_block_id;
        $request->name = $request->name;
        $request->outline = (bool) isset($request->outline);
        $request->border_radius = in_array($request->border_radius, ['straight', 'round', 'rounded']) ? $request->border_radius : 'rounded';
        $request->animation = in_array($request->animation, require app_path() . '/includes/biolink_animations.php') || $request->animation == 'false' ? $request->animation : false;
        $request->animation_runs = in_array($request->animation_runs, ['repeat-1', 'repeat-2', 'repeat-3', 'infinite']) ? $request->animation_runs : false;
        $request->text_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->text_color) ? '#000' : $request->text_color;
        $request->background_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->background_color) ? '#fff' : $request->background_color;
        $request->icon = $request->icon;
        foreach(['first_name', 'last_name', 'phone', 'street', 'city', 'zip', 'region', 'country', 'email', 'website', 'company', 'note'] as $key) {
            $request[$key] = $request[$key];
        }

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();

        $biolink_block->settings = json_decode($biolink_block->settings);

        /* Image upload */
        $db_image = $this->handle_image_upload($biolink_block->settings->image,$request, 'block_thumbnail_images/', settings()->links->thumbnail_image_size_limit);

        /* Check for the removal of the already uploaded file */
        if(isset($request['image_remove'])) {

                /* Delete current file */
                if(!empty($biolink_block->settings->image) && file_exists(public_path(). '/public/uploads/block_thumbnail_images/' . $biolink_block->settings->image)) {
                    unlink(public_path() . '/uploads/block_thumbnail_images/' . $biolink_block->settings->image);
                }

            $db_image = null;
        }

        $image_url = $db_image ? public_path() . '/uploads/block_thumbnail_images/' . $db_image : null;

        $settings = [
            'name' => $request->name,
            'image' => $db_image,
            'text_color' => $request->text_color,
            'background_color' => $request->background_color,
            'outline' => $request->outline,
            'border_radius' => $request->border_radius,
            'animation' => $request->animation,
            'animation_runs' => $request->animation_runs,
            'icon' => $request->icon,
        ];

        foreach(['first_name', 'last_name', 'phone', 'street', 'city', 'zip', 'region', 'country', 'email', 'website', 'company', 'note'] as $key) {
            $settings[$key] = $request[$key];
        }

        $settings = json_encode($settings);

        /* Database query */
        BiolinkBlock::where('id', $request->biolink_block_id)->update([
            'settings' => $settings,
        ]);


        return response()->json(language()->link->success_message->settings_updated, 'success', ['image_prop' => true, 'image_url' => $image_url]);
    }

    private function update_biolink_text(Request $request) {
        $request->biolink_block_id = (int) $request->biolink_block_id;
        $request->title = $request->title;
        $request->description = $request->description;
        $request->text_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->text_color) ? '#fff' : $request->text_color;
        $request->description_text_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->description_text_color) ? '#fff' : $request->description_text_color;

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();

        $settings = json_encode([
            'title' => $request->title,
            'description' => $request->description,
            'title_text_color' => $request->text_color,
            'description_text_color' => $request->description_text_color,
        ]);

        /* Database query */
        BiolinkBlock::where('id', $request->biolink_block_id)->update([
            'settings' => $settings,
        ]);


        return response()->json(language()->link->success_message->settings_updated, 'success');
    }

    private function update_biolink_image(Request $request) {
        $request->biolink_block_id = (int) $request->biolink_block_id;
        $request->location_url = $request->location_url;

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();
        $biolink_block->settings = json_decode($biolink_block->settings);

        $this->check_location_url($request->location_url, true);

        /* Image upload */
        $db_image = $this->handle_image_upload($biolink_block->settings->image,$request, 'block_images/', settings()->links->image_size_limit);

        $image_url = $db_image ? public_path() . '/public/uploads/block_images/' . $db_image : null;

        $settings = json_encode([
            'image' => $db_image,
        ]);

        /* Database query */
        BiolinkBlock::where('id', $request->biolink_block_id)->update([
            'location_url' => $request->location_url,
            'settings' => $settings,
        ]);

        return response()->json(language()->link->success_message->settings_updated, 'success', ['image_prop' => true, 'image_url' => $image_url]);
    }

    private function update_biolink_image_grid(Request $request) {
        $request->biolink_block_id = (int) $request->biolink_block_id;
        $request->name = $request->name;
        $request->location_url = $request->location_url;

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();

        $biolink_block->settings = json_decode($biolink_block->settings);

        $this->check_location_url($request->location_url, true);

        /* Image upload */
        $db_image = $this->handle_image_upload($biolink_block->settings->image,$request, 'block_images/', settings()->links->image_size_limit);

        $image_url = $db_image ? public_path() . '/uploads/block_images/' . $db_image : null;

        $settings = json_encode([
            'name' => $request->name,
            'image' => $db_image,
        ]);

        /* Database query */
        BiolinkBlock::where('id', $request->biolink_block_id)->update([
            'location_url' => $request->location_url,
            'settings' => $settings,
        ]);

        return response()->json(language()->link->success_message->settings_updated, 'success', ['image_prop' => true, 'image_url' => $image_url]);
    }

    private function update_biolink_divider(Request $request) {
        $request->biolink_block_id = (int) $request->biolink_block_id;
        $request->margin_to = $request->margin_to > 7 || $request->margin_to < 0 ? 3 : (int) $request->margin_to;
        $request->margin_bottom = $request->margin_bottom > 7 || $request->margin_bottom < 0 ? 3 : (int) $request->margin_bottom;
        $request->background_color = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request->background_color) ? '#fff' : $request->background_color;
        $request->icon = $request->icon;

        $biolink_block = BiolinkBlock::where('id', $request->biolink_block_id)->where('user_id', Auth::user()->id)->first();

        $settings = json_encode([
            'margin_top' => $request->margin_to,
            'margin_bottom' => $request->margin_bottom,
            'background_color' => $request->background_color,
            'icon' => $request->icon,
        ]);

        /* Database query */
        BiolinkBlock::where('id', $request->biolink_block_id)->update([
            'location_url' => $request->location_url,
            'settings' => $settings,
        ]);

        return response()->json(language()->link->success_message->settings_updated, 'success');
    }

    function delete(Request $request)
    {
        $biolink = BiolinkBlock::where('id',$request->biolink_block_id);

        $link_id = $biolink->first()->link_id;

        $biolink->delete();

        return response()->json(['status'=>'success', 'url' => url('user/link/' . $link_id)]);

    }

    private function handle_image_upload($uploaded_image,Request $request, $upload_folder, $size_limit) {
        /* Image upload */
        $image_allowed_extensions = ['jpg', 'jpeg', 'png', 'svg', 'ico', 'gif'];
        $image = (bool) !empty($request->file('image')) && !isset($request->image_remove);
        $db_image = $uploaded_image;

        if($image)
        {
            if($request->hasFile('image'))
            {
                $image_file_extension = $request->file('image')->getClientOriginalExtension();
                $original_file_size = $request->file('image')->getSize();

                // if(!in_array($image_file_extension, $image_allowed_extensions)) {
                //     return response()->json(language()->global->error_message->invalid_file_type, 'error');
                // }

                // if($original_file_size > $size_limit * 1000000) {
                //     return response()->json(sprintf(language()->global->error_message->file_size_limit, $size_limit), 'error');
                // }


                /* Generate new name for the image */
                $image_new_name = md5(time() . rand()) . '.' . $image_file_extension;

                 /* Delete current file */
                 if(!empty($uploaded_image) && file_exists(public_path('uploads/'.$upload_folder.$uploaded_image))) {
                    unlink(public_path('uploads/'.$upload_folder.$uploaded_image));
                }

                  /* Upload the original */
                  $request->file('image')->move(public_path('uploads/'.$upload_folder), $image_new_name);

                  $db_image = $image_new_name;


            }
        }

        return $db_image;
    }


    /* Function to bundle together all the checks of an url */
    private function check_location_url($url, $can_be_empty = false) {

        // if(empty(trim($url)) && $can_be_empty) {
        //     return;
        // }

        // if(empty(trim($url))) {
        //     return response()->json(language()->global->error_message->empty_fields, 'error');
        // }

        // $url_details = parse_url($url);

        // if(!isset($url_details['scheme'])) {
        //     return response()->json(language()->link->error_message->invalid_location_url, 'error');
        // }

        // $plan_settings = json_decode(Auth::user()->plan->plan->settings);

        // if(!$plan_settings->deep_links && !in_array($url_details['scheme'], ['http', 'https'])) {
        //     return response()->json(language()->link->error_message->invalid_location_url, 'error');
        // }

        // /* Make sure the domain is not blacklisted */
        // if(in_array(mb_strtolower(get_domain($url)), explode(',', settings()->links->blacklisted_domains))) {
        //    return  response()->json(language()->link->error_message->blacklisted_domain, 'error');
        // }

        /* Check the url with google safe browsing to make sure it is a safe website */
        // if(settings()->links->google_safe_browsing_is_enabled) {
        //     if($this->google_safe_browsing_check($url, settings()->links->google_safe_browsing_api_key)) {
        //         return response()->json(language()->link->error_message->blacklisted_location_url, 'error');
        //     }
        // }
    }


}
