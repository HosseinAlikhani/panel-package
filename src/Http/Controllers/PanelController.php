<?php

namespace D3CR33\Panel\Http\Controllers;

use D3CR33\Auth\Base\Model\User;
use D3CR33\Panel\Base\BaseEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * Class PanelController
 * @package D3CR33\Panel\Http\Controllers
 */
class PanelController extends BaseEntity
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPanel()
    {
        return view('Panel::index');
    }
    /**
     * ProfileController constructor.
     *
     * @param  Request  $request
     * @param  User  $user
     */
    public function __construct(Request $request, User $user)
    {
        $this->model = $user;
        $this->request = $request;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProfile()
    {
        return view('Panel::user_profile');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getSetting()
    {
        return view('Panel::user_settings');
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function postSetting()
    {
        return app(UserController::class,$this->request->all())->patchUser(Auth::id());
    }


}
