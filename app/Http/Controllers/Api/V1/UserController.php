<?php

namespace App\Http\Controllers\Api\V1;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
// use App\Jobs\SendRegisterEmail;
use App\Transformers\UserTransformer;

class UserController
{


    public function store(Request $request)
    {
        // $validator = \Validator::make($request->input(), [
        //     'email' => 'required|email|unique:users',
        //     'name' => 'required|string',
        //     'password' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return $this->errorBadRequest($validator);
        // }

        $email = $request->get('name');
        $password = $request->get('password');

        $attributes = [
            'name' => $email,
            'nickname' => $request->get('nickname'),
            'password' => app('hash')->make($password),
        ];
        $user = User::create($attributes);

        // 201 with location
         $location = dingo_route('v1', 'users.show', $user->id);

        $result = [
            'token' => \Auth::fromUser($user),
            'expired_at' => Carbon::now()->addMinutes(config('jwt.ttl'))->toDateTimeString(),
            'refresh_expired_at' => Carbon::now()->addMinutes(config('jwt.refresh_ttl'))->toDateTimeString(),
        ];

        return $this->response->item($user, new UserTransformer())
            ->header('Location', $location)
            ->setMeta($result)
            ->setStatusCode(201);
    }
}