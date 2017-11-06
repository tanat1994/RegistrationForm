<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelJsLocalizationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        return array('localization.js');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app['localization.js'] = $this->app->share(function ($app) {
            $generator = new Generators\LangJsGenerator($app['files']);
            return new Commands\LangJsCommand($generator);
        });
        $this->commands('localization.js');
    }

    public function provides()
    {
        return array('localization.js');
    }
}
