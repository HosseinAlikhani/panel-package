<?php

namespace D3CR33\Panel\Http\Controllers;

use D3CR33\Panel\Base\BaseEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

/**
 * Class UserController
 * @package D3CR33\Panel\Http\Controllers
 */
class RoleController extends BaseEntity
{
    public function __construct(Role $role, Request $request)
    {
        $this->model   = $role;
        $this->request = $request;
    }

    public function getRoles()
    {
        $roles = $this->findAll();
        return view('Panel::role.list', compact(['roles']));
    }

    public function getRole($id)
    {
        $role = $this->findOne($id);
        $permissions = $role->permissions;
        return view('Panel::role.update', compact(['role', 'permissions']));
    }

    public function getPostRole()
    {
        return view('Panel::role.create');
    }

    public function postRole()
    {
        if ($this->validator($this->variable())->fails()) {
            return response($this->validator($this->variable())->errors()->first(), 422);
        }

        $role = $this->create();
        if ($role) {
            $this->givePermissionTo($role->id);
            return response(__('Panel-Lang::trans.message.createok'), 200);
        }
        return $role  ?
             :
            response(__('Panel-Lang::trans.message.createno'), 500);
    }

    public function patchRole($id)
    {
        if ($this->validator($this->variable())->fails()) {
            return response($this->validator($this->variable())->errors()->first(), 422);
        }
        $this->givePermissionTo($id);
        return $this->update($id) ?
            response(__('Panel-Lang::trans.message.updateok'), 200) :
            response(__('Panel-Lang::trans.message.updateno'), 500);
    }

    public function deleteRole($id)
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

    public function explodePermission()
    {
        return explode(',',$this->request->permission);
    }

    public function givePermissionTo($roleid)
    {
        return $this->findOne($roleid)->syncPermissions($this->explodePermission());
    }
}