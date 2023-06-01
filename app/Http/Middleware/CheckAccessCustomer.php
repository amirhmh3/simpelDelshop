<?php

namespace App\Http\Middleware;

use App\Base\BaseResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccessCustomer
{

    public function handle(Request $request, Closure $next)
    {
        switch (Auth::user()->access) {
            case 1:
                return BaseResponse::JSON(false, "Access to death", 403);
            case 2:
                if (!Auth::user()->register_form)
                    return BaseResponse::JSON(false, "please register form", 403);
            default:
                return $next($request);
        }
    }
}
