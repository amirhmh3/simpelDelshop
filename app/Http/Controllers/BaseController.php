<?php

namespace App\Http\Controllers;

use App\Base\BaseResponse;
use App\Http\Service\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public $service;
    public $request;
    public $repository;
    public function __construct($request, $service,$repository)
    {
        $this->request=$request;
        $this->service=$service;
        $this->repository=$repository;
    }


    public function index()
    {
        $result=$this->repository->index();
        return BaseResponse::JSON(true,$result,201);
    }

    public function store(Request $request)
    {
        $param=$request->all();
        $result=$this->repository->store($param);
        return BaseResponse::JSON(true,$result,201);
    }


    public function show($id)
    {
        $result=$this->repository->show($id);
        return BaseResponse::JSON(true,$result,201);
    }


    public function update(Request $request, $id)
    {
        $param=$request->all();
        $result=$this->repository->update($param,$id);
        return BaseResponse::JSON(true,$result,201);
    }


    public function destroy($id)
    {
        $result=$this->repository->destroy($id);
        return BaseResponse::JSON(true,$result,201);
    }

}
