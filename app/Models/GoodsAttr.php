<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/25 0025
 * Time: 13:39
 */

namespace App\Models;


class GoodsAttr
{
    protected $primaryKey  = 'goods_attr_id';
    protected $fillable = ['goods_id', 'attribute_key', 'attribute_value', 'market_price', 'shop_price', 'supplier_price', 'goods_num', 'weight'];
}