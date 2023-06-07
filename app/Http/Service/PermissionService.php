<?php

namespace App\Http\Service;

use App\Base\BaseResponse;
use App\Http\repository\RoleRepository;
use Illuminate\Support\Facades\Validator;

class PermissionService extends Service
{


    public function store($param)
    {
        $roll = [
            'role_id' => ['required'],
            'name' => ['required']
        ];
        $validate = Validator::make($param, $roll);
        if ($validate->fails()) {
            return BaseResponse::JSON( false,  $validate->errors(), 401);
        }

        return $this->repository->store($param);
    }
}
