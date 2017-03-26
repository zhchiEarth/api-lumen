<?php

namespace App\Models;

class GoodsPic extends BaseModel
{
    protected $fillable = ['goods_id', 'pic_desc', 'pic_url', 'status', 'weight'];
}