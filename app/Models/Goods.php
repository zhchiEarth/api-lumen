<?php

namespace App\Models;


class Goods extends BaseModel
{
    protected $primaryKey  = 'goods_id';
    protected $fillable = ['goods_code', 'user_id', 'one_category_id', 'two_category_id', 'brand_id', 'price', 'audit_status', 'sale_count', 'view_count', 'comment_count'];
}