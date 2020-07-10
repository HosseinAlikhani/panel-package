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
        if ($this->validator()->fails())
            return response($this->validator()->errors()->first(), 422);

        return $this->Usercontroller()->update(Auth::id(),$this->variable()) ?
            response(__('Panel-Lang::trans.message.updateok'), 200) :
            response(__('Panel-Lang::trans.message.updateno'), 500);
    }

    /**
     * @return array
     */
    public function variable()
    {
        return [
            'fname' =>  $this->request->fname,
            'lname' =>  $this->request->lname,
            'email' =>  $this->request->email
        ];
    }

    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator()
    {
        foreach (array_keys($this->variable()) as $key)
            $rule[$key] = 'required';
        return Validator::make($this->request->all(), $rule, $this->message());
    }

    /**
     * @return array
     */
    public function message()
    {
        return [
            'required'  =>  __('Auth-Lang::validation.required'),
        ];
    }}
