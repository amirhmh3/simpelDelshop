<?php

namespace App\Http\repository;

use App\Models\Colleague;
use App\Models\User;
use Spatie\Permission\Models\Role;

class ColleagueRepository extends Repository
{
    public $model;
    public function __construct(Colleague $model)
    {
        parent::__construct($model);
        $this->model=$model;
    }

    public function store($param)
    {
        $result=$this->model->create($param);
        $user=User::find($param["user_id"]);
        $user->update(["register_form"=>true]);
        return $result;
    }

    public function getAll($param)
    {
        $colleagues=$this->model->all()->toArray();
        foreach ($colleagues as $key=>$val){
            $user=User::find($val["user_id"]);
            $colleagues[$key]["roles"]=$user->roles->pluck('name','id')->toArray();
        }
        $role=Role::all()->toArray();
        return ["users"=>$colleagues,"roles"=>$role,"useRole"];
    }

    public function storeWeb($param)
    {
        $user=User::query()->create([
            "access" =>1,
            "register_form" =>1,
            'email'=>$param["email"],
            "password"=>bcrypt($param["password"])
        ]);
        $data=["name"=>$param["name"],"family"=>$param["family"],"user_id"=>$user->id,"status"=>1];
        return $this->model->create($data);
    }

}
