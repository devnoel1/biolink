<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    function index()
    {
        $data['page_title'] = '<i class="fa fa-fw fa-xs fa-wrench text-primary-900 mr-2"></i>'.  language()->admin_settings->header;
        $data['admin_socails'] = require app_path().'/includes/admin_socail.php';
        return view('admin.settings.settings',$data);
    }

    function update(Request $request)
    {
         /* Main Tab */
         $request->title = filter_var($request->title, FILTER_SANITIZE_STRING);
         $request['default_timezone'] = filter_var($request['default_timezone'], FILTER_SANITIZE_STRING);
         $request['default_theme_style'] = filter_var($request['default_theme_style'], FILTER_SANITIZE_STRING);
         $request['email_confirmation'] = (bool) $request['email_confirmation'];
         $request['register_is_enabled'] = (bool) $request['register_is_enabled'];
         $request['terms_and_conditions_url'] = filter_var($request['terms_and_conditions_url'], FILTER_SANITIZE_STRING);
         $request['privacy_policy_url'] = filter_var($request['privacy_policy_url'], FILTER_SANITIZE_STRING);

         /* Links Tab */
         $request['links_branding'] = trim($request['links_branding']);
         $request['links_shortener_is_enabled'] = (bool) $request['links_shortener_is_enabled'];
         $request['links_domains_is_enabled'] = (bool) $request['links_domains_is_enabled'];
         $request['links_main_domain_is_enabled'] = (bool) $request['links_main_domain_is_enabled'];
         $request['links_blacklisted_domains'] = implode(',', array_map('trim', explode(',', $request['links_blacklisted_domains'])));
         $request['links_blacklisted_keywords'] = implode(',', array_map('trim', explode(',', $request['links_blacklisted_keywords'])));
         $request['links_google_safe_browsing_is_enabled'] = (bool) $request['links_google_safe_browsing_is_enabled'];
         $request['links_avatar_size_limit'] = $request['links_avatar_size_limit'] > get_max_upload() || $request['links_avatar_size_limit'] < 0 ? get_max_upload() : (float) $request['links_avatar_size_limit'];
         $request['links_background_size_limit'] = $request['links_background_size_limit'] > get_max_upload() || $request['links_background_size_limit'] < 0 ? get_max_upload() : (float) $request['links_background_size_limit'];
         $request['links_thumbnail_image_size_limit'] = $request['links_thumbnail_image_size_limit'] > get_max_upload() || $request['links_thumbnail_image_size_limit'] < 0 ? get_max_upload() : (float) $request['links_thumbnail_image_size_limit'];
         $request['links_image_size_limit'] = $request['links_image_size_limit'] > get_max_upload() || $request['links_image_size_limit'] < 0 ? get_max_upload() : (float) $request['links_image_size_limit'];

         /* Payment Tab */
         $request['payment_is_enabled'] = (bool) $request['payment_is_enabled'];
         $request['payment_codes_is_enabled'] = (bool) $request['payment_codes_is_enabled'];
         $request['payment_taxes_and_billing_is_enabled'] = (bool) $request['payment_taxes_and_billing_is_enabled'];
         $request['payment_type'] = in_array($request['payment_type'], ['one_time', 'recurring', 'both']) ? filter_var($request['payment_type'], FILTER_SANITIZE_STRING) : 'both';
         $request['paypal_is_enabled'] = (bool) $request['paypal_is_enabled'];
         $request['stripe_is_enabled'] = (bool) $request['stripe_is_enabled'];
         $request['offline_payment_is_enabled'] = (bool) $request['offline_payment_is_enabled'];


         /* Business Tab */
         $request['business_invoice_is_enabled'] = (bool) $request['business_invoice_is_enabled'];


           /* Ads Tab */
           $request['ads_header'] = $request['a_header'];
           $request['ads_footer'] = $request['a_footer'];
           $request['ads_header_biolink'] = $request['a_header_biolink'];
           $request['ads_footer_biolink'] = $request['a_footer_biolink'];

           /* Announcements */
           $request['announcements_id'] = md5($request['announcements_content']);
           $request['announcements_text_color'] = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request['announcements_text_color']) ? '#000' : $request['announcements_text_color'];
           $request['announcements_background_color'] = !preg_match('/#([A-Fa-f0-9]{3,4}){1,2}\b/i', $request['announcements_background_color']) ? '#fff' : $request['announcements_background_color'];
           $request['announcements_show_logged_in'] = (bool) isset($request['announcements_show_logged_in']);
           $request['announcements_show_logged_out'] = (bool) isset($request['announcements_show_logged_out']);

           /* SMTP Tab */
           $request['smtp_auth'] = (bool) isset($request['smtp_auth']);
           $request['smtp_username'] = filter_var($request['smtp_username'] ?? '', FILTER_SANITIZE_STRING);
           $request['smtp_password'] = $request['smtp_password'] ?? '';

           /* Email notifications */
           $request['email_notifications_emails'] = str_replace(' ', '', $request['email_notifications_emails']);
           $request['email_notifications_new_user'] = (bool) isset($request['email_notifications_new_user']);
           $request['email_notifications_new_payment'] = (bool) isset($request['email_notifications_new_payment']);
           $request['email_notifications_new_domain'] = (bool) isset($request['email_notifications_new_domain']);

           /* Webhooks */
           $request['webhooks_user_new'] = trim(filter_var($request['webhooks_user_new'], FILTER_SANITIZE_STRING));
           $request['webhooks_user_delete'] = trim(filter_var($request['webhooks_user_delete'], FILTER_SANITIZE_STRING));

           /* Check for any errors on the logo image */
           $image_allowed_extensions = [
            'logo' => ['jpg', 'jpeg', 'png', 'svg', 'gif'],
            'favicon' => ['png', 'ico', 'gif'],
            'opengraph' => ['jpg', 'jpeg', 'png', 'gif'],
        ];
        $image = [
            'logo' => !empty($_FILES['logo']['name']) && !isset($request['logo_remove']),
            'favicon' => !empty($_FILES['favicon']['name']) && !isset($request['favicon_remove']),
            'opengraph' => !empty($_FILES['opengraph']['name']) && !isset($request['opengraph_remove']),
        ];

        foreach(['logo', 'favicon', 'opengraph'] as $image_key) {
            if($image[$image_key]) {
                $file_name = $request->file($image_key);
                $file_extension = $file_name->getClientOriginalExtension();

                if(!in_array($file_extension, $image_allowed_extensions[$image_key])) {
                    $request->session()->flash('message',language()->global->error_message->invalid_file_type);
                    $request->session()->flash('type','error');
                    return back();
                }

                    /* Generate new name for image */
                    $image_new_name = md5(time() . rand()) . '.' . $file_extension;

                        /* Delete current image */
                        if(!empty(settings()->{$image_key}) && file_exists(public_path('/uploads/'. $image_key . '/' . settings()->{$image_key}))) {
                            unlink(public_path('/uploads/'. $image_key . '/' . settings()->{$image_key}));
                        }

                        /* Upload the original */
                        $file_name->move(public_path('/uploads/'. $image_key . '/'), $image_new_name);


                    /* Database query */
                    Setting::where('key',$image_key)->update(['value' => $image_new_name]);




                /* Check for the removal of the already uploaded file */
                if(isset($request[$image_key . '_remove'])) {
                    /* Local deleting */

                        /* Delete current file */
                        if(!empty(settings()->{$image_key}) && file_exists(public_path('/uploads/'. $image_key . '/' . settings()->{$image_key}))) {
                            unlink(public_path('/uploads/'. $image_key . '/' . settings()->{$image_key}));
                        }


                    /* Database query */
                    Setting::where('key',$image_key)->update(['value' => '']);

            }
        }
    }

    $settings_keys = [

        /* Main */
        'title',
        'default_language',
        'default_theme_style',
        'default_timezone',
        'email_confirmation',
        'register_is_enabled',
        'index_url',
        'terms_and_conditions_url',
        'privacy_policy_url',

        /* Links */
        'links' => [
            'branding',
            'shortener_is_enabled',
            'domains_is_enabled',
            'main_domain_is_enabled',
            'blacklisted_domains',
            'blacklisted_keywords',
            'google_safe_browsing_is_enabled',
            'google_safe_browsing_api_key',
            'avatar_size_limit',
            'background_size_limit',
            'thumbnail_image_size_limit',
            'image_size_limit',
        ],

        /* Payment */
        'payment' => [
            'is_enabled',
            'type',
            'brand_name',
            'currency',
            'codes_is_enabled',
            'taxes_and_billing_is_enabled'
        ],

        'paypal' => [
            'is_enabled',
            'mode',
            'client_id',
            'secret'
        ],

        'stripe' => [
            'is_enabled',
            'publishable_key',
            'secret_key',
            'webhook_secret'
        ],

        'offline_payment' => [
            'is_enabled',
            'instructions'
        ],

        /* Business */
        'business' => [
            'invoice_is_enabled',
            'invoice_nr_prefix',
            'name',
            'address',
            'city',
            'county',
            'zip',
            'country',
            'email',
            'phone',
            'tax_type',
            'tax_id',
            'custom_key_one',
            'custom_value_one',
            'custom_key_two',
            'custom_value_two'
        ],

        /* Captcha */
        'captcha' => [
            'type',
            'recaptcha_public_key',
            'recaptcha_private_key',
            'hcaptcha_site_key',
            'hcaptcha_secret_key',
            'login_is_enabled',
            'register_is_enabled',
            'lost_password_is_enabled',
            'resend_activation_is_enabled'
        ],

        /* Facebook */
        'facebook' => [
            'is_enabled',
            'app_id',
            'app_secret'
        ],

        /* Ads */
        'ads' => [
            'header',
            'footer',
            'header_biolink',
            'footer_biolink'
        ],

        /* Socials */
        'socials' => array_keys(require app_path() . '/includes/admin_socail.php'),

        /* SMTP */
        'smtp' => [
            'from_name',
            'from',
            'host',
            'encryption',
            'port',
            'auth',
            'username',
            'password'
        ],

        /* Custom */
        'custom' => [
            'head_js',
            'head_css'
        ],

        /* Announcements */
        'announcements' => [
            'id',
            'content',
            'text_color',
            'background_color',
            'show_logged_in',
            'show_logged_out'
        ],

        /* Email Notifications */
        'email_notifications' => [
            'emails',
            'new_user',
            'new_payment',
            'new_domain',
            'new_affiliate_withdrawal',
        ],

        /* Webhooks */
        'webhooks' => [
            'user_new',
            'user_delete'
        ],

    ];

    foreach($settings_keys as $key => $value) {

        /* Should we update the value? */
        $to_update = true;

        if(is_array($value)) {

            $values_array = [];

            foreach($value as $sub_key) {

                /* Check if the field needs cleaning */
                if(!in_array($key . '_' . $sub_key, ['announcements_content', 'custom_head_css', 'links_branding', 'custom_head_css', 'custom_head_js', 'ads_header', 'ads_footer', 'ads_header_biolink', 'ads_footer_biolink', 'offline_payment_instructions'])) {
                    $values_array[$sub_key] = $request[$key . '_' . $sub_key];
                } else {
                    $values_array[$sub_key] = $request[$key . '_' . $sub_key];
                }
            }

            $value = json_encode($values_array);

            /* Check if new value is the same with the old one */
            if(json_encode(settings()->{$key}) == $value) {
                $to_update = false;
            }

        } else {
            $key = $value;
            $value = $request[$key];

            /* Check if new value is the same with the old one */
            if(settings()->{$key} == $value) {
                $to_update = false;
            }
        }

        if($to_update) {
            Setting::where('key',$key)->update(['value' => $value]);
        }

    }

    $request->session()->flash('message',language()->admin_settings->success_message->saved);
    $request->session()->flash('type','success');

    return back();
}
}
