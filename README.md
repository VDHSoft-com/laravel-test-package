# Test package for Laravel 10

This is a simple test package/skeleton for Laravel 10+; I use it as the base of my 'vendor' modules; just change the name 'TestPkg' into everything you want.
<br>it shows how create class/members and views in a package.
<br><br>All comments are welcome !

## Important
This package will only be supported for security reasons..

## Requires

"nothing": "*"

## Instalation

Edit your `composer.json`.

	"require": {
		"vdhsoft-com/laravel-test-package": "dev-main"
	}

    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/VDHSoft-com/laravel-test-package"
        }
    ]

Add app\Http\Controllers\TestPkgController.php to your project (only if you want a test)

Execute :

	composer update
	or
	composer require vdhsoft-com/laravel-test-package:dev-main
	
	optional : 
	
	php artisan config:clear
	php artisan view:clear
	php artisan route:clear
	php artisan cache:clear
	php artisan optimize:clear
	composer dump-autoload

	
	if you want to personalize the view; 
	you need to publish them in resources/views/vendor/testpkg with :
	
	php artisan vendor:publish --provider="VDHSoft\TestPkg\TestPkgServiceProvider" --tag=views
	

Add to your file app.php

	'providers' => ServiceProvider::defaultProviders()->merge([
	/*
	 * Package Service Providers...
	 */

	VDHSoft\TestPkg\TestPkgServiceProvider::class,
	
	/*
	 * Application Service Providers...
	 */
	...
	])->toArray(),


And in the Facades

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
        'TestPkg' => VDHSoft\TestPkg\Facades\TestPkg::class,
    ])->toArray(),

in the composer.json du package :
Add the alias for the facade (NOT NECESSARY !!) :


"extra": {
    "laravel": {
        "providers": [
            "VDHSoft\\TestPkg\\TestPkgServiceProvider"
        ],
        "aliases": {
            "Example": "VDHSoft\\TestPkg\\Facades\\Example"
        }
    }
}

## Examples (see app\Http\Controller\TestPkgController.php)
Calling Example WITH the Facade (TestPkgController.php) :

	<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	class TestPkgController extends Controller
	{
		public function showTest()
		{
			$userName = 'www.vdhsoft.com';

			$result = \Example::greet($userName, "1");  // Appel la méthode greet via la facade
			echo($result);
			echo('<br>End.');
		}

		public function showTestView()
		{
			return view('testpkg::example');
		}
	}

Calling Example WITHOUT the Facade #1 (TestPkgController.php) :

	<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	class TestPkgController extends Controller
	{
		public function showTest()
		{
			$userName = 'www.vdhsoft.com';

			$example = new \VDHSoft\TestPkg\Example(); // Appel la méthode directement sans facade
			$result = $example->greet($userName, "2");
			echo($result);
			echo('<br>End.');
		}

		public function showTestView()
		{
			return view('testpkg::example');
		}
	}

Calling Example WITHOUT the Facade #2 (TestPkgController.php) :

	<?php

	namespace App\Http\Controllers;

	use Illuminate\Http\Request;

	use VDHSoft\TestPkg\Example;

	class TestPkgController extends Controller
	{
		public function showTest()
		{
			$userName = 'www.vdhsoft.com';

			$example = new Example(); // Appel la méthode directement sans facade
			$result = $example->greet($userName, "2");
			echo($result);
			echo('<br>End.');
		}

		public function showTestView()
		{
			return view('testpkg::example');
		}
	}



At the end Add in routes.php
```
Route::get('/testpkg', [TestPkgController::class, 'showTest']); // call the class/members from the package
Route::get('/testpkgview', [TestPkgController::class, 'showTestView']); // call a view from the package
```

## If you want to run the test (after TestPkgController.php has been copied)
Execute (class) : http://localhost/laravel/package/project/public/testpkg
Execute (view) : http://localhost/laravel/package/project/public/testpkgview

## Demo (coming soon on my channel)
https://www.youtube.com/@Domizza
