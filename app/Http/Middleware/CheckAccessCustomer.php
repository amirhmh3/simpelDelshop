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
        if (!Auth::user()->register_form)
            return BaseResponse::JSON(false, "please register form", 403);
        else
            return $next($request);
    }
}
