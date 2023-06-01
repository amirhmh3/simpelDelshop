<?php

namespace App\Http\Middleware;

use App\Base\BaseResponse;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAccess
{
//    /**
//     * Handle an incoming request.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
//     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
//     */
    public function handle(Request $request, Closure $next)
    {
        switch (Auth::user()->access) {
            case 2:
                return BaseResponse::JSON(false, "Access to death", 403);
            default:
                return $next($request);
        }


    }
}
