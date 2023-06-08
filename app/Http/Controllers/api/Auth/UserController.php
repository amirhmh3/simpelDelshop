<?php

namespace App\Http\Controllers\api\Auth;

use App\Base\BaseResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->all();
        $roll = [
            'access' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6', 'max:20']
        ];
        $validate = Validator::make($data, $roll);
        if ($validate->fails()) {
            return response()->json(["success" => false, "message" => $validate->errors()], 401);
        }
        $data['password'] = bcrypt(request('password'));
        $user = User::create($data);
        $token = $user->createToken('authToken')->accessToken;
        return response()->json(["success" => true, "user" => $user, "token" => $token], 201);
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $roll = [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];


        $validate = Validator::make($data, $roll);

        if ($validate->fails()) {
            return BaseResponse::JSON(false, $validate->errors(), 400);
        }


        if (!auth()->attempt($request->all())) {
            return BaseResponse::JSON(false, "Invalid Credentials", 401);
        }


        $user = User::where("email", $data["email"])->get();
        $token = Auth::user()->createToken('authToken')->accessToken;

        return BaseResponse::JSON(true, ["user" => $user, "token" => $token], 201);
    }
}
