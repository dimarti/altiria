<?php

namespace Usckuro\Altaria\Providers;

use Illuminate\Support\ServiceProvider;
use Usckuro\Altaria\Altaria;

class AltariaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Language
        $this->loadTranslationsFrom( __DIR__.'/Lang', 'altaria');

        $this->publishes([
            __DIR__.'/../config/altaria.php' => config_path('altaria.php'),
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
        $this->mergeConfigFrom( __DIR__.'/../config/altaria.php', 'altaria');

        $this->app['altaria'] = $this->app->share(function($app) {
            return new Altaria;
        });
    }
}
