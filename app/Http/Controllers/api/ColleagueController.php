<?php

namespace App\Http\Controllers\api;

use App\Base\BaseResponse;
use App\Http\Controllers\BaseController;
use App\Http\repository\ColleagueRepository;
use App\Http\Service\ColleagueService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $param["user_id"]=Auth::user()->id;
        $result=$this->service->store($param);
        return BaseResponse::JSON(true,$result,201);
    }

    public function index(Request $request)
    {
        $param=$request->all();
        $result=$this->service->index($param);
        return BaseResponse::JSON(true,$result,201);
    }

    public function getAll(Request $request)
    {
        $param=$request->all();
        $datas=$this->repository->index($param);
        return view('colleague', compact('datas'));
    }

}
