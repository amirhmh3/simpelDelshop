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

    public function index($param)
    {
        return $this->repository->index($param);

    }
}
