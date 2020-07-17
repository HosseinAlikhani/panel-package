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
                        $router->get('create', 'UserController@getPostUser')->name('get.post.user');
                        $router->get('', 'UserController@getUsers')->name('get.users');
                        $router->get('{id}', 'UserController@getUser')->name('get.user');
                        $router->post('{id}', 'UserController@patchUser')->name('update.user');
                        $router->post('', 'UserController@postUser')->name('post.user');
                        $router->delete('{id}', 'UserController@deleteUser')->name('delete.user');
                    }
                );

                $router->group(
                    ['prefix'   =>  'role'],
                    function($router) {
                        $router->get('create', 'RoleController@getPostRole')->name('get.post.role');
                        $router->get('', 'RoleController@getRoles')->name('get.roles');
                        $router->get('{id}', 'RoleController@getRole')->name('get.role');

                        $router->post('', 'RoleController@postRole')->name('post.role');
                        $router->patch('{id}', 'RoleController@patchRole')->name('patch.role');
                        $router->delete('{id}', 'RoleController@deleteRole')->name('delete.role');
                    }
                );

                $router->group(
                    ['prefix'   =>  'permission'],
                    function($router) {
                        $router->get('create', 'PermissionController@getPostPermission')->name('get.post.permission');
                        $router->get('all', 'PermissionController@getAllPermissions')->name('get.all.permissions');
                        $router->get('', 'PermissionController@getPermissions')->name('get.permissions');
                        $router->get('{id}', 'PermissionController@getPermission')->name('get.permission');

                        $router->post('', 'PermissionController@postPermission')->name('post.permission');
                        $router->patch('{id}', 'PermissionController@patchPermission')->name('patch.permission');
                        $router->delete('{id}', 'PermissionController@deletePermission')->name('delete.permission');
                    }
                );
            }
        );
    }
}