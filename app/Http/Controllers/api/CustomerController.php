<?php

namespace App\Http\Controllers\api;

use App\Base\BaseResponse;
use App\Http\Controllers\BaseController;
use App\Http\repository\ColleagueRepository;
use App\Http\repository\CustomerRepository;
use App\Http\Service\ColleagueService;
use App\Http\Service\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends BaseController
{
    public $service;
    public $repository;
    public function __construct(Request $request, CustomerService $service,CustomerRepository $repository)
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

    public function getAllWallet(Request $request)
    {
        $param=$request->all();
        $param["user_id"]=Auth::user()->id;
        $result=$this->service->getAllWallet($param);
        return BaseResponse::JSON(true,$result,201);
    }

}
