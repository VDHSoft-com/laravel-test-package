# Test package for Laravel 10

This is a simple test package/skeleton for Laravel 10+; I use it as the base of my 'vendor' modules; just change the name 'TestPkg' into everything you want.
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

Execute

	composer update
	or
	composer require vdhsoft-com/laravel-test-package:dev-main

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
	}



At the end Add in routes.php
```
Route::get('/testpkg', [TestPkgController::class, 'showTest']);
```

## If you want to run the test (after TestPkgController.php has been copied)
Execute : http://localhost/laravel/package/project/public/testpkg

## Demo (coming soon on my channel)
https://www.youtube.com/@Domizza
