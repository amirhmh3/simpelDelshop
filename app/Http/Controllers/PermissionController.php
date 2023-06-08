<?php

namespace App\Http\Controllers;

use App\Base\BaseResponse;
use App\Http\Controllers\BaseController;
use App\Http\repository\ColleagueRepository;
use App\Http\repository\CustomerRepository;
use App\Http\repository\PermissionRepository;
use App\Http\Service\ColleagueService;
use App\Http\Service\CustomerService;
use App\Http\Service\PermissionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends BaseController
{
    public $service;
    public $repository;
    public function __construct(Request $request, PermissionService $service,PermissionRepository $repository)
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

    public function roleGivePermissionTo(Request $request)
    {
        $param=$request->all();
        $this->service->roleGivePermissionTo($param);
        return back()->withInput();
    }

    public function accessColleague(Request $request)
    {
        $param=$request->all();
        $this->service->accessColleague($param);
        return back()->withInput();
    }


    public function deleteColleague(Request $request)
    {
        $param=$request->all();
        $this->service->deleteColleague($param);
        return back()->withInput();
    }

    public function removePermissionInRole(Request $request)
    {
        $param=$request->all();
        $this->service->removePermissionInRole($param);
        return back()->withInput();
    }


    public function index(Request $request)
    {
        $param=$request->all();
        $datas=$this->repository->index($param);
        return view('auth.permission.index',compact('datas'));
    }


}
