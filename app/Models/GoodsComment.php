<?php

namespace App\Models;


class GoodsComment extends BaseModel
{
    protected $fillable = ['goods_id', 'order_id', 'user_id', 'title', 'content', 'status'];
}