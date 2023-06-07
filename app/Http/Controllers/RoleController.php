<?php

namespace App\Http\Controllers;

use App\Base\BaseResponse;
use App\Http\Controllers\BaseController;
use App\Http\repository\ColleagueRepository;
use App\Http\repository\CustomerRepository;
use App\Http\repository\RoleRepository;
use App\Http\Service\ColleagueService;
use App\Http\Service\CustomerService;
use App\Http\Service\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends BaseController
{
    public $service;
    public $repository;
    public function __construct(Request $request, RoleService $service,RoleRepository $repository)
    {
        parent::__construct($request, $service,$repository);
        $service->setRepository($repository);
        $this->service=$service;
        $this->repository=$repository;

    }


    public function store(Request $request)
    {
        $param=$request->all();
        $this->service->store($param);
        return redirect("permission");
    }



}
