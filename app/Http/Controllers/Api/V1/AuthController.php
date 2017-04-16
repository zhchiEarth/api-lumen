<?php

namespace App\Http\Controllers\Api\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Dingo\Api\Exception\ValidationHttpException;
// use Illuminate\Contracts\Auth\Factory as Auth;

class AuthController
{
    // 接口帮助调用
    use Helpers;

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorBadRequest($validator);
        }

        $credentials = $request->only('email', 'password');
        // 验证失败返回403
        if (! $token = \Auth::attempt($credentials)) {
           $this->response->errorUnauthorized('用户名或密码错误');
        }

        $result['data'] = [
            'token' => $token,
            'expired_at' => Carbon::now()->addMinutes(config('jwt.ttl'))->toDateTimeString(),
            'refresh_expired_at' => Carbon::now()->addMinutes(config('jwt.refresh_ttl'))->toDateTimeString(),
        ];

        return $this->response->array($result)->setStatusCode(201);
    }
}