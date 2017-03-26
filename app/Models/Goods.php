<?php

namespace App\Models;


class Goods extends BaseModel
{

    protected $fillable = ['goods_code', 'user_id', 'one_category_id', 'two_category_id', 'brand_id', 'price', 'audit_status', 'sale_count', 'view_count', 'comment_count'];
}