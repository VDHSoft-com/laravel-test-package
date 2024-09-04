<?php

namespace VDHSoft\TestPkg;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class TestPkgServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
    {
		$dbg = "Hello world!";
    }
}