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
                $router->get('profile', 'PanelController@getProfile')->name('profile');
                $router->get('setting', 'PanelController@getSetting')->name('profile-setting');
                $router->post('setting', 'PanelController@postSetting')->name('post.setting');

                $router->group(
                    ['prefix'   =>  'user'],
                    function($router) {
                        $router->get('', 'UserController@getUsers')->name('get.users');
                        $router->get('{id}', 'UserController@getUser')->name('get.user');
                        $router->post('{id}', 'UserController@postUser')->name('update.user');
                        $router->delete('{id}', 'UserController@deleteUser')->name('delete.user');
                    }
                );
            }
        );
    }
}