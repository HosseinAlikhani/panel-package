<?php

namespace D3CR33\Panel\Base;

use D3CR33\Auth\Base\Model\User;
use D3CR33\Panel\Http\Controllers\UserController;
use Illuminate\Http\Request;

class BaseController
{
    public function UserController()
    {
        return app(UserController::class);
    }
}
