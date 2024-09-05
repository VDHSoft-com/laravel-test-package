<?php

namespace VDHSoft\TestPkg;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class TestPkgServiceProvider extends ServiceProvider
{
    public function register() // register the services
    {
		// Enregistre une instance de 'Example' sous le nom 'testpkg' dans le container
        $this->app->singleton('testpkg', function($app) {
            return new Example();
        });
    }

    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot() // tasks after registration
    {
		// Boot methods like routes or views can be placed here
        // Charger les vues du package
        $this->loadViewsFrom(__DIR__.'/resources/views', 'testpackage');

        // Si vous voulez permettre la publication des vues dans le projet principal
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/testpackage'),
        ], 'views');

    }
}