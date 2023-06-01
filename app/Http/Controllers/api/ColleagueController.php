<?php

namespace App\Http\Controllers\api;

use App\Base\BaseResponse;
use App\Http\Controllers\BaseController;
use App\Http\repository\ColleagueRepository;
use App\Http\Service\ColleagueService;
use Illuminate\Http\Request;

class ColleagueController extends BaseController
{
    public $service;
    public $repository;
    public function __construct(Request $request, ColleagueService $service,ColleagueRepository $repository)
    {
        parent::__construct($request, $service,$repository);
        $service->setRepository($repository);
        $this->service=$service;
        $this->repository=$repository;

    }

    public function store(Request $request)
    {
        $param=$request->all();
        $result=$this->service->store($param);
        return BaseResponse::JSON(true,$result,201);
    }

}
