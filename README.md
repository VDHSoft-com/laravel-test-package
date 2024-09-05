# Test package for Laravel 10

This is a simple test package/skeleton for Laravel

## Important
This package will only be supported for security reasons..

## Demo
<a href="http://laravel-filemanager.rhcloud.com/" target="_blank" >http://...com/</a><br>

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
Ajoutez l'alias pour la facade (si nécessaire) :


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



At the end Add in routes.php

	Route::group(['prefix' => 'filemanager','middleware' => 'auth'], function() {    
	    Route::get('show', 'FilemanagerLaravelController@getShow');
	    Route::get('connectors', 'FilemanagerLaravelController@getConnectors');
	    Route::post('connectors', 'FilemanagerLaravelController@postConnectors');
	});


## If you want to put in a sub folder
Ejemplo http://localhost/admin/filemanager/

Modify your routes.php
```
Route::group(array('middleware' => 'auth'), function(){    
    Route::get('admin/filemanager/show', 'FilemanagerLaravelController@getShow');
    Route::get('admin/filemanager/connectors', 'FilemanagerLaravelController@getConnectors');
    Route::post('admin/filemanager/connectors', 'FilemanagerLaravelController@postConnectors');
});
```
Modify your controller
```
// app/Http/Controllers/FilemanagerLaravelController.php
public function getConnectors()
	{
		$extraConfig = array('dir_filemanager'=>'/admin');
		$f = FilemanagerLaravel::Filemanager($extraConfig);
		$f->connector_url = url('/').'/admin/filemanager/connectors';
		$f->run();
	}
	public function postConnectors()
	{
		$extraConfig = array('dir_filemanager'=>'/admin');
		$f = FilemanagerLaravel::Filemanager($extraConfig);
		$f->connector_url = url('/').'/admin/filemanager/connectors';
		$f->run();
	}
```

Modify all links by adding the name of your folder
```	
// resources/views/vendor/filemanager-laravel/filemanager/index.blade.php
<link rel="stylesheet" type="text/css" href="{{ url('') }}/admin/filemanager/styles/filemanager.css" />
```

Change the absolute url:
```
<script type="text/javascript">
editor_config.selector = "textarea";
editor_config.path_absolute = "http://laravel-filemanager.rhcloud.com/admin/";
tinymce.init(editor_config);
</script>
```

## Demo
http://www.youtube.com/watch?v=yowJRKZ3Ums
