<?php
namespace D3CR33\Panel\Routes;

use Illuminate\Contracts\Routing\Registrar as Router;

class PanelRouteRegister
{
    /**
     * @var Router
     */
    protected $router;

    /**
     * RouteRegister constructor.
     *
     * @param  Router  $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function all()
    {
        $this->router->group(
            ['prefix'   =>  'panel', 'middleware'    =>  ['auth']],
            function($router) {
                $router->get('', 'PanelController@getPanel')->name('panel');
            }
        );
    }
}