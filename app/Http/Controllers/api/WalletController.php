<?php

namespace App\Http\Controllers\api;

use App\Base\BaseResponse;
use App\Http\Controllers\BaseController;
use App\Http\repository\WalletRepository;
use App\Http\Service\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends BaseController
{
    public $service;
    public $repository;
    public function __construct(Request $request, WalletService $service,WalletRepository $repository)
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

    public function storeWeb(Request $request)
    {

        $param=$request->all();
        $param["user_id"]=Auth::user()->id;
        $this->service->store($param);
        return back()->withInput();
    }
}
