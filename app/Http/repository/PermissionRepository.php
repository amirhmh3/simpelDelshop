<?php

namespace App\Http\repository;

use App\Models\File;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRepository extends Repository
{
    public $model;
    public function __construct(Permission $model)
    {
        parent::__construct($model);
        $this->model=$model;
    }

    public function store($param)
    {
        $data=["name"=>$param["name"]];
        $this->model->create($data);
        $role=Role::find($param["role_id"]);
        return $role->givePermissionTo($param["name"]);
    }

    public function index($param)
    {
        $role=Role::all()->toArray();
        return ["permission"=>$this->model::all()->toArray(),"role"=>$role];
    }

}
