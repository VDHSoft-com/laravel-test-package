<?php

namespace VDHSoft\TestPkg;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class TestPkgServiceProvider extends ServiceProvider
{
    public function register() // register the services
    {
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
		$dbg = "Hello world!";
    }
}