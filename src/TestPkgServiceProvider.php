<?php

namespace VDHSoft\TestPkg;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class TestPkgServiceProvider extends ServiceProvider
{
    public function register() // register the services
    {

    }

    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot() // tasks after registration
    {
		$dbg = "Hello world!";
    }
}