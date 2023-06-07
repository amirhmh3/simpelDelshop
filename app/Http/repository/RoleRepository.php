<?php

namespace App\Http\repository;

use App\Models\File;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class RoleRepository extends Repository
{
    public $model;
    public function __construct(Role $model)
    {
        parent::__construct($model);
        $this->model=$model;
    }


}
