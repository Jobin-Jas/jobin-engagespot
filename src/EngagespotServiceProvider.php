<?php

namespace Jasjbn\Engagespot;

use Illuminate\Support\ServiceProvider;

class EngagespotServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('engagespot', function ($app) {
            return new Engagespot();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/../config/engagespot.php' => config_path('engagespot.php'),
        ]);
    }
}
