<?php

namespace App\Models;


class GoodsAttr
{
    protected $primaryKey  = 'goods_attr_id';
    protected $fillable = ['goods_id', 'attribute_key', 'attribute_value', 'market_price', 'shop_price', 'supplier_price', 'goods_num', 'weight'];
}