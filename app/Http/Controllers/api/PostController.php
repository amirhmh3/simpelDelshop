<?php

namespace App\Http\Controllers\api;

use App\Base\BaseResponse;
use App\Http\Controllers\BaseController;
use App\Http\repository\PostRepository;
use App\Http\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends BaseController
{
    public $service;
    public $repository;
    public function __construct(Request $request, PostService $service,PostRepository $repository)
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
