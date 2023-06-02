<?php

namespace App\Http\Service;

use App\Base\BaseResponse;
use Illuminate\Support\Facades\Validator;

class FileService extends Service
{
    public function store($param)
    {
        $roll = [
            'post_id' => ['required'],
            'file' => ['required'],
            'file_type_id' => ['required']
        ];
        $validate = Validator::make($param->all(), $roll);
        if ($validate->fails()) {
            return BaseResponse::JSON( false,  $validate->errors(), 401);
        }

        return $this->repository->store($param);
    }
}
