<?php

namespace App\Http\repository;

use App\Models\Customer;
use App\Models\User;

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

}
