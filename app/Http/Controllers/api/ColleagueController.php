<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Service\ColleagueService;
use App\Http\Service\Service;
use App\Models\BaseModel;
use App\Models\Colleague;
use Illuminate\Http\Request;

class ColleagueController extends BaseController
{
    public $service;
    public $model;
    public function __construct(Request $request, Service $service,Colleague $model)
    {
        parent::__construct($request, $service,$model);
        $this->service=$service;
        $this->model=$model;
    }


}
