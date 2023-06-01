<?php

namespace App\Http\repository;

use App\Models\Colleague;

class ColleagueRepository extends Repository
{
    public $model;
    public function __construct(Colleague $model)
    {
        parent::__construct($model);
        $this->model=$model;
    }

}
