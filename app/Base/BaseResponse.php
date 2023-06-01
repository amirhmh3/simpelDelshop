<?php

namespace App\Base;

class BaseResponse
{
    public static function JSON($success = true, $message = null, $statusCode = 200)
    {
        return response()->json(["success" => $success, "message" => $message, "status" => $statusCode]);
    }
}
