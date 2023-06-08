<?php

namespace App\Http\Service;

use App\Base\BaseResponse;
use Illuminate\Support\Facades\Validator;

class CustomerService extends Service
{
    public function store($param)
    {
        $roll = [
            'name' => ['required'],
            'family' => ['required'],
            'status' => ['required']
        ];
        $validate = Validator::make($param, $roll);
        if ($validate->fails()) {
            return BaseResponse::JSON( false,  $validate->errors(), 401);
        }

        return $this->repository->store($param);

    }


    public function getAllWallet($param)
    {
//        $roll = [
//            'name' => ['required'],
//            'family' => ['required'],
//            'status' => ['required']
//        ];
//        $validate = Validator::make($param, $roll);
//        if ($validate->fails()) {
//            return BaseResponse::JSON( false,  $validate->errors(), 401);
//        }

        return $this->repository->getAllWallet($param);

    }

    public function getAll($param)
    {
        return $this->repository->getAll($param);
    }
}
