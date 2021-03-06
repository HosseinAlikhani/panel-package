<?php

namespace D3CR33\Panel\Http\Controllers;

use D3CR33\Panel\Base\BaseEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

/**
 * Class UserController
 * @package D3CR33\Panel\Http\Controllers
 */
class PermissionController extends BaseEntity
{
    public function __construct(Permission $permission, Request $request)
    {
        $this->model   = $permission;
        $this->request = $request;
    }

    public function getPermissions()
    {
        $permissions = $this->findAll();
        return view('Panel::permission.list', compact(['permissions']));
    }

    public function getAllPermissions()
    {
        return $this->findAll();
    }

    public function getPermission($id)
    {
        $role = $this->findOne($id);
        return view('Panel::permission.update', compact(['role']));
    }

    public function getPostPermission()
    {
        return view('Panel::permission.create');
    }

    public function postPermission()
    {
        if ($this->validator($this->variable())->fails()) {
            return response($this->validator($this->variable())->errors()->first(), 422);
        }
        return $this->create() ?
            response(__('Panel-Lang::trans.message.createok'), 200) :
            response(__('Panel-Lang::trans.message.createno'), 500);    }

    public function patchPermission($id)
    {
        if ($this->validator($this->variable())->fails()) {
            return response($this->validator($this->variable())->errors()->first(), 422);
        }

        return $this->update($id) ?
            response(__('Panel-Lang::trans.message.updateok'), 200) :
            response(__('Panel-Lang::trans.message.updateno'), 500);
    }

    public function deletePermission($id)
    {
        return $this->delete($id) ?
            response(__('Panel-Lang::trans.message.deleteok'), 200) :
            response(__('Panel-Lang::trans.message.deleteno'), 500);
    }

    /**
     * @return array
     */
    public function variable()
    {
        return [
            'name' => $this->request->name,
            'guard_name' => $this->request->guard_name,
        ];
    }
    
    /**
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator($variable)
    {
        foreach (array_keys($variable) as $key) {
            $rule[$key] = 'required';
            if ($key === 'guard_name') {
                $rule[$key] = '';
            }
        }
        return Validator::make($this->request->all(), $rule, $this->message(), $this->attributes());
    }

    /**
     * @return array
     */
    public function message()
    {
        return [
            'required'  => __('Auth-Lang::validation.required'),
            'confirmed' => __('Auth-Lang::validation.confirmed'),
        ];
    }

    /**
     * customize validation attributes
     * @return array
     */
    public function attributes()
    {
        return [
            'fname'    => __('Auth-Lang::validation.attributes.fname'),
            'lname'    => __('Auth-Lang::validation.attributes.lname'),
            'email'    => __('Auth-Lang::validation.attributes.email'),
            'password' => __('Auth-Lang::validation.attributes.password'),
        ];
    }

    public function create($param = null)
    {
        return parent::create($this->variable($this->request->all())); // TODO: Change the autogenerated stub
    }

    public function update($id, $param = null)
    {
        return parent::update($id, $this->variable($this->request->all())); // TODO: Change the autogenerated stub
    }
}
