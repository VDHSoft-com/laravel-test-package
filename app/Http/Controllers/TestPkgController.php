<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use VDHSoft\TestPkg\Example;

class TestPkgController extends Controller
{
    public function showTest()
    {
    	$userName = 'www.vdhsoft.com';

		// Sans '\' : PHP pense que tu utilises une classe locale (dans le même namespace ou importée), et donc l'appel échoue si ce n'est pas ce que tu veux.
		// Avec '\' : PHP sait que tu fais référence à l'alias global de Laravel, et utilise la facade associée à l'alias 'Example'
		$result = \Example::greet($userName, "1");  // Appel la méthode greet via la facade
    	echo($result);
    	echo('<br>');
    	
    	$example = new \VDHSoft\TestPkg\Example(); // Appel la méthode directement sans facade
		$result = $example->greet($userName, "2"); 
    	echo($result);
    	echo('<br>');

        return ("End.");
    }
    
    public function showTestView()
    {
    	return view('testpkg::example');
    }
}


