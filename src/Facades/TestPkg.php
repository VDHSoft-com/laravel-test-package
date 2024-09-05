<?php 

namespace VDHSoft\TestPkg\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The TestPkg facade.
 *
 * @package VDHSoft\TestPkg\Facades
 * @author VDHSoft <info@vdhsoft.com>
 */
class TestPkg extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        //return 'laravel-test-package';
        return 'testpkg'; // Cela doit correspondre à l'alias enregistré dans le service provider
    }
}
