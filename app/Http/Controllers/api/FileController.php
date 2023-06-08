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
        $user=Auth::user();
        if (!$user->can('create file'))
            dd("dont Access");
        $param=$request;
        $param["user_id"]=$user->id;
        $result=$this->service->store($param);
        return BaseResponse::JSON(true,$result,201);
    }

    public function storeWeb(Request $request)
    {
        $user=Auth::user();
        if (!$user->can('create file'))
            dd("dont Access");
        $param=$request;
        $param["user_id"]=$user->id;
        $this->service->store($param);
        return redirect('/');
    }

    public function create(Request $request)
    {
        $data=$request->all();
        return view('file',compact('data'));
    }

}
