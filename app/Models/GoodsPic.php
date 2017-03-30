<?php

namespace App\Models;

class GoodsPic extends BaseModel
{
    protected $primaryKey = 'pic_id';
    protected $fillable = ['goods_id', 'pic_desc', 'pic_url', 'status', 'weight'];
}