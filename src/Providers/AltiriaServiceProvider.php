<?php

namespace Usckuro\Altiria\Providers;

use Illuminate\Support\ServiceProvider;
use Usckuro\Altiria\Altiria;

class AltiriaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Language
        $this->loadTranslationsFrom( __DIR__.'/Lang', 'altiria');

        $this->publishes([
            __DIR__.'/../config/altiria.php' => config_path('altiria.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Config
        $this->mergeConfigFrom( __DIR__.'/../config/altiria.php', 'altiria');

        $this->app->singleton(Altiria::class, function($app){
            return new Altiria();
        });
    }
}
