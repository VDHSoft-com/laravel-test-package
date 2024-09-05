<?php

namespace VDHSoft\TestPkg;

use VDHSoft\TestPkg\Exceptions\FileNotFoundException;

class TestPkg
{
    public function __construct()
    {
    	$dbg = "Hello world";
		}	
		
    public function greet($name)
    {
        return "Hello, " . $name . "!";
    }
}
