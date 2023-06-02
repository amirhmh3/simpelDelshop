<?php

namespace App\Http\Service;

use App\Base\BaseResponse;
use Illuminate\Support\Facades\Validator;

class PostService extends Service
{
    public function store($param)
    {
        $roll = [
            'title' => ['required'],
            'description' => ['required'],
            'img' => ['required']
        ];
        $validate = Validator::make($param->all(), $roll);
        if ($validate->fails()) {
            return BaseResponse::JSON( false,  $validate->errors(), 401);
        }

        return $this->repository->store($param);

    }
}
