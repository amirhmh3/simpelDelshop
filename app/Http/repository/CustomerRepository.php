<?php

namespace App\Http\repository;

use App\Models\Customer;
use App\Models\User;
use Spatie\Permission\Models\Role;

class CustomerRepository extends Repository
{
    public $model;
    public function __construct(Customer $model)
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

    public function getAllWallet($param)
    {
//        $result=$this->model->create($param);
        $user=User::find($param["user_id"]);
//        $user->update(["register_form"=>true]);

        return Customer::find($user->customer()->first()->id)->wallet()->get()->toArray();
    }


    public function getAll($param)
    {
        $ccustomers=$this->model->all()->toArray();
        foreach ($ccustomers as $key=>$val){
            $user=User::find($val["user_id"]);
            $ccustomers[$key]["roles"]=$user->roles->pluck('name','id')->toArray();
        }
        $role=Role::all()->toArray();
        return ["users"=>$ccustomers,"roles"=>$role,"useRole"];
    }

}
