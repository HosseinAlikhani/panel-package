<?php
namespace D3CR33\Panel\Provider;

use D3CR33\Panel\Routes\PanelRouteRegister;
use Illuminate\Support\Facades\Route;

/**
 * Class Auth
 * @package D3CR33\Auth\Provider
 * @author Hossein Alikhani
 */
class Panel
{
    /**
     * register route to application
     * @param  null  $callback
     * @param  array  $options
     */
    public static function routes($callback = null, array $options = [])
    {
        $callback = $callback ? : function($router) {
            $router->all();
        };

        $defaultOptions = [
            'namespace' =>  '\D3CR33\Panel\Http\Controllers',
            'prefix'    =>  '',
            'middleware'    =>  ['web', 'auth']
        ];

        $options = array_merge($defaultOptions, $options);

        Route::group($options, function ($router) use ($callback){
            $callback(new PanelRouteRegister($router));
        });
    }
}