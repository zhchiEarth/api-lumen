<?php

namespace App\Models;


class OrderCart extends BaseModel
{
	protected $primaryKey = 'cart_id';
	protected $fillable = ['user_id', 'goods_attr_id', 'price', 'number'];
}