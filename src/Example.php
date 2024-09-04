<?php

namespace VDHSoft\TestPkg;

class Example
{
    public function greet($name)
    {
        return "Hello, " . $name . "!";
    }
}

/*

Super, content que cela fonctionne ! Maintenant que votre package est installé et reconnu par Composer, vous pouvez accéder à ses fonctionnalités dans votre projet Laravel. Voici comment procéder :

1. Vérifier l'enregistrement du service provider
Dans votre fichier composer.json du package, vous avez indiqué un service provider VDHSoft\TestPkg\TestPkgServiceProvider. Laravel charge automatiquement ce service provider grâce à la configuration dans la section extra :

"extra": {
    "laravel": {
        "providers": [
            "VDHSoft\\TestPkg\\TestPkgServiceProvider"
        ]
    }
}
Cela signifie que si votre package contient des services, des routes, ou des commandes, ils seront automatiquement enregistrés lorsque Laravel démarre. Assurez-vous que le service provider est correctement défini.

2. Utiliser les classes du package
Si votre package contient des classes avec des fonctions que vous voulez utiliser, vous pouvez simplement les instancier et les appeler comme vous le feriez avec n'importe quelle autre classe dans Laravel.

Exemple d'utilisation
Supposons que votre package ait une classe Example dans src/Example.php :

namespace VDHSoft\TestPkg;

class Example
{
    public function greet($name)
    {
        return "Hello, " . $name . "!";
    }
}
Vous pouvez l'utiliser dans votre application Laravel comme suit :

use VDHSoft\TestPkg\Example;

$example = new Example();
echo $example->greet('World');  // Affichera "Hello, World!"
3. Accéder aux fonctionnalités via Facades (si applicable)
Si votre package utilise des facades pour offrir une interface simplifiée, assurez-vous que celles-ci sont correctement configurées dans le service provider du package. Par exemple :

Dans TestPkgServiceProvider.php :

use Illuminate\Support\Facades\Facade;

class TestPkgServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('example', function($app) {
            return new \VDHSoft\TestPkg\Example();
        });
    }

    public function boot()
    {
        // Boot methods like routes or views can be placed here
    }
}
Dans votre fichier composer.json du package :
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
Puis, vous pouvez accéder à la classe Example via la facade dans vos contrôleurs ou vues Laravel :


use Example;

$result = Example::greet('World');  // Appelle la méthode greet via la facade
4. Tester les routes ou commandes personnalisées
Si votre package enregistre des routes ou des commandes Artisan, vous pouvez y accéder comme vous le feriez pour celles de Laravel. Par exemple, si vous avez défini des routes dans votre service provider :

public function boot()
{
    $this->loadRoutesFrom(__DIR__.'/routes/web.php');
}
Vous pouvez accéder à ces routes dans votre application en utilisant les URL que vous avez définies.

Conclusion
En résumé, vous pouvez accéder aux fonctionnalités de votre package en utilisant les classes, facades, routes, ou commandes qu'il expose. Le service provider est la clé pour enregistrer tout ce qui est nécessaire à l'intérieur de votre application Laravel. Une fois cela en place, vous pouvez utiliser les fonctionnalités de votre package comme n'importe quelle autre partie de Laravel.
*/
