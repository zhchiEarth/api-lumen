<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'user_id'      => $user->id,
            'mobile_phone' => $user->mobile_phone,
            'email'        => $user->email,
            'nickname'     => $user->nickname,
            'avatar'       => $user->avatar,
            'gender'       => $user->gender,
            'status'       => $user->status,
            'created_at'   => $user->created_at,
            'updated_at'   => $user->updated_at
        ];
    }
}