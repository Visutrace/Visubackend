<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //  
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        $this->app->register('Laravel\Socialite\SocialiteServiceProvider');
        $this->app->register('Illuminate\Html\HtmlServiceProvider');
    }
}
