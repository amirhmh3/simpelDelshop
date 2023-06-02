<?php

namespace App\Http\repository;

use App\Models\Customer;

class CustomerRepository extends Repository
{
    public $model;
    public function __construct(Customer $model)
    {
        parent::__construct($model);
        $this->model=$model;
    }

}
