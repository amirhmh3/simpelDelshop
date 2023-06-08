<?php

namespace App\Http\Service;

use App\Base\BaseResponse;
use Illuminate\Support\Facades\Validator;

class ColleagueService extends Service
{
    public function store($param)
    {
        $roll = [
            'user_id' => ['required',"integer"],
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

    public function storeWeb($param)
    {
        $roll = [
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6', 'max:20'],
            'name' => ['required'],
            'family' => ['required']
        ];
        $validate = Validator::make($param, $roll);
        if ($validate->fails()) {
            return BaseResponse::JSON( false,  $validate->errors(), 401);
        }

        return $this->repository->storeWeb($param);

    }

    public function getAll($param)
    {
        return $this->repository->getAll($param);
    }
}
