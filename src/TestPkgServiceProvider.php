<?php

namespace VDHSoft\TestPkg;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class TestPkgServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap any application services.
    *
    * @return void
    */
	// Utilisé pour réaliser des tâches de configuration qui nécessitent que tous les services soient enregistrés, 
	// comme le chargement de vues, la publication de ressources, la définition de routes, etc.
    public function boot() // tasks after registration
    {
		// Boot methods like routes or views can be placed here
        // Charger les vues du package
        $this->loadViewsFrom(__DIR__.'/resources/views', 'testpkg');

        // Si vous voulez permettre la publication des vues dans le projet principal
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/testpkg'),
        ], 'views');

		// Définir des événements ou des observateurs :
		//Event::listen('event.name', function ($param) {
		// Code à exécuter
		//});
		
		//Définir des routes ou des configurations spécifiques :
		//Route::middleware('web')
		//	->namespace($this->namespace)
		//	->group(base_path('routes/web.php'));
    }

	// Utilisé pour enregistrer des services, bindings, configurations dans le conteneur de services.
    public function register() // register the services
    {
		// Enregistrement de classes ou services dans le conteneur,
		// enregistre une instance de 'Example' sous le nom 'testpkg' dans le container
        $this->app->singleton('testpkg', function($app) {
            return new Example();
        });
		// Binding d'une interface à une implémentation :
		// $this->app->bind(ExampleInterface::class, ExampleImplementation::class);
    }
}