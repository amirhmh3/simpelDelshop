<?php

namespace App\Http\repository;

class Repository
{
    public $model;
    public function __construct($model)
    {
        $this->model=$model;
    }

}
