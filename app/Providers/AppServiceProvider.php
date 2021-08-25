<?php

namespace App\Providers;

use App\Core\Language;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $settings = (new \App\Core\Setsettings)->get();

        \App\Core\Settings::initialize($settings);

        /* Initiate the Language system */
        Language::initialize(app_path() . '/languages/');

        /* Initiate the Language system with the default language */
        Language::set_default($settings->default_language);


    }
}
