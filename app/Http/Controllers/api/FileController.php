<?php

namespace App\Http\Controllers\api;

use App\Base\BaseResponse;
use App\Http\Controllers\BaseController;
use App\Http\repository\FileRepository;
use App\Http\Service\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends BaseController
{
    public $service;
    public $repository;
    public function __construct(Request $request, FileService $service,FileRepository $repository)
    {
        parent::__construct($request, $service,$repository);
        $service->setRepository($repository);
        $this->service=$service;
        $this->repository=$repository;

    }

    public function store(Request $request)
    {
        $param=$request;
        $param["user_id"]=Auth::user()->id;
        $result=$this->service->store($param);
        return BaseResponse::JSON(true,$result,201);
    }

}
