<?php

namespace App\Http\repository;

use App\Models\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionRepository extends Repository
{
    public $model;

    public function __construct(Permission $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function store($param)
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $data = ["name" => $param["name"], 'guard_name' => $param["guard_name"]];
        $permission = $this->model->create($data);
        if ($param["role_id"] == 0)
            return $permission;

        $role = Role::find($param["role_id"]);
        return $role->givePermissionTo($param["name"]);

    }

    public function roleGivePermissionTo($param)
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        if ($param["role_id"] == 0) {
            $roles = Role::all()->toArray();
            foreach ($roles as $role) {

                if ($role["guard_name"] == $param["guard_name"]) {
                    $role = Role::find($role["id"]);
                    $role->givePermissionTo($param["name"]);
                }
            }
            return true;
        }
        $role = Role::find($param["role_id"]);
        return $role->givePermissionTo($param["name"]);

    }

    public function accessColleague($param)
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        if ($param["user_id"] == 0 or $param["role_id"] == 0)
            return "error";

        $user = User::find($param["user_id"]);
        $role = Role::find($param["role_id"]);

        Auth::shouldUse($role->guard_name);
        $user->assignRole($role->name);
        return true;

    }

    public function deleteColleague($param)
    {
        if ($param["user_id"] == 0)
            return "error";

        $user = User::find($param["user_id"]);

        if ($param["role_id"] == 0)
            return $user->syncRoles([]);


        $role = Role::find($param["role_id"]);
        $user->removeRole($role);
        return true;

    }

    public function index($param)
    {
        $role = Role::all()->toArray();
        foreach ($role as $key => $val) {
            $role[$key]["permission"] = Role::find($val["id"])->permissions->pluck('name', 'id')->toArray();
        }
        return ["permission" => $this->model::all()->toArray(), "role" => $role];
    }

    public function removePermissionInRole($param)
    {
        $role = Role::find($param["role_id"]);
        if ($param["name"] == 0) {
            return $role->revokePermissionTo($role->permissions->pluck('name')->toArray());
        }
        return $role->revokePermissionTo($param["name"]);
    }

}
