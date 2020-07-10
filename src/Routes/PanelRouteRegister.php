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
            ['prefix'   =>  'panel'],
            function($router) {
                $router->get('', 'PanelController@getPanel')->name('panel');
            }
        );
        $this->router->group(
            ['prefix'   =>  'profile'],
            function($router){
                $router->get('', 'ProfileController@getProfile')->name('profile');
                $router->get('setting', 'ProfileController@getSetting')->name('profile-setting');
                $router->post('setting', 'ProfileController@postSetting')->name('post.setting');
            }
        );
    }
}